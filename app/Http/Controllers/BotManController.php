<?php

namespace App\Http\Controllers;

use App\Models\Videogame;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Support\Facades\Auth;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app("botman");

        $botman->hears(".*(ey|hey|hi|hello|hola|buenas|buenos días|buenos dias|buenas tardes|buenas noches).*", function ($bot, $message) {
            $bot->startConversation(new WelcomeConversation());
        });

        $botman->hears(".*(menu).*", function ($bot, $message) {
            $bot->startConversation(new MenuConversation());
        });

        $botman->fallback(function ($bot) {
            $bot->typesAndWaits(2);
            $bot->reply("Lo siento, <span style=\"color: #6e5712\">no te he entendido.</span>");
            $bot->startConversation(new DisplayCommandsConversation());
        });

        $botman->listen();
    }
}

class DisplayCommandsConversation extends Conversation
{

    public function run()
    {
        $this->sayAvailableCommands();
    }

    public function sayAvailableCommands()
    {

        $this->bot->typesAndWaits(2);

        $availableCommands = ["menu"];
        $message = "Esta es la lista de comandos disponibles: <br><br>";

        foreach ($availableCommands as $command) {
            $message .= "<b>· $command</b><br>";
        }

        $this->say($message);
    }
}

class WelcomeConversation extends Conversation
{
    public function run()
    {
        $this->getCustomMessage();
        $this->bot->startConversation(new MenuConversation());
    }

    public function getCustomMessage()
    {

        $this->bot->typesAndWaits(2);

        if (auth()->user()) {
            $user = auth()->user();
            $this->say("Hola de nuevo, <b>{$user->name}</b>.");
        } else {
            $this->say("Hola, bienvenido a <b>Nexus Play</b>.");
        }
    }
}

class HelpConversation extends Conversation
{
    public function run()
    {
        $this->askForHelp();
    }

    public function askForHelp()
    {

        $this->bot->typesAndWaits(2);

        $question = Question::create("¿Puedo ayudarte en algo más?")
            ->callbackId("ask_for_help");

        $this->ask($question, function (Answer $answer) {
            switch (strtolower($answer->getValue())) {
                case "s":
                case "si":
                case "sí":
                case "y":
                case "yes":
                case "yep":
                    $this->bot->startConversation(new MenuConversation());
                    break;
                case "n":
                case "no":
                case "nope":
                case "nah":
                    $this->bot->typesAndWaits(2);
                    $this->say("😄 ¡Está bien! Si necesitas algo más, no dudes en consultarme.");
                    break;
                default:
                    $this->bot->typesAndWaits(2);
                    $this->say("Lo siento, <span style=\"color: #6e5712\">no te he entendido.</span>");
                    $this->askForHelp();
                    break;
            }
        });
    }
}
class MenuConversation extends Conversation
{
    public function run()
    {
        $this->askWhatToDo();
    }

    public function askWhatToDo()
    {

        $this->bot->typesAndWaits(2);

        $buttons = [
            Button::create("Buscar un juego")->value("search-game"),
            Button::create("Contactar con Nexus")->value("contact-us"),
            Button::create("Salir del menú")->value("exit"),
        ];

        $question = Question::create("⬇️ ¿En qué puedo ayudarte?")
            ->callbackId("ask_what_to_do")
            ->addButtons($buttons);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    case "search-game":
                        $this->askForAGame();
                        break;
                    case "contact-us":
                        $this->provideContactInfo();
                        break;
                    case "exit":
                        $this->exitMenu();
                        break;
                    default:
                        $this->bot->typesAndWaits(2);
                        $this->say("Lo siento, <span style=\"color:#6e5712;\">no te he entendido.</span> <br>Por favor, selecciona una opción del menú.");
                        $this->askWhatToDo();
                        break;
                }
            } else {
                $this->bot->typesAndWaits(2);
                $this->say("Lo siento, <span style=\"color: #6e5712;\">no te he entendido.</span> <br>Por favor, selecciona una opción del menú.");
                $this->askWhatToDo();
            }
        });
    }

    public function askForAGame()
    {
        $this->bot->typesAndWaits(2);

        $question = Question::create("Escribe <span style=\"color: #273bb0\">el nombre del juego</span> que deseas buscar y lo consultaré en el catálogo.")
            ->fallback("Lo siento, <span style=\"color:#6e5712;\">no te he entendido.</span>")
            ->callbackId("ask_for_a_game");

        $this->ask($question, function (Answer $answer) {

            $gameSearched = $answer->getText();
            $game = Videogame::where("name", "LIKE", "%" . $gameSearched . "%")->first();

            $this->bot->typesAndWaits(2);

            if ($game) {
                $this->say("¡Buenas noticias!<br><br>El juego \"{$game->name}\" <span style=\"color: green;\">se encuentra disponible</span> en nuestro catálogo.");
            } else {
                $this->say("Lo sentimos.<br><br>El juego \"{$gameSearched}\" <span style=\"color: #CC0000;\">no se encuentra disponible</span> en nuestro catálogo.");
            }

            $this->bot->startConversation(new HelpConversation());
        });
    }

    public function provideContactInfo()
    {
        $this->bot->typesAndWaits(2);
        $this->say("¡Claro! Puedes acceder a nuestra página de contacto a través de la siguiente url: <br><br><span style=\"color: blue;\"><b>http://localhost:8000/home/company/contact-us</b></span>");
        $this->bot->startConversation(new HelpConversation());
    }

    public function exitMenu()
    {
        $this->bot->typesAndWaits(2);
        $this->say("😄 ¡Está bien! Si necesitas algo más, no dudes en consultarme.");
    }
}
