<?php

namespace App\Http\Controllers;

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
        $botman = app('botman');

        $botman->hears('.*(hi|hello|hola|buenas|buenos días|buenos dias|buenas tardes|buenas noches).*', function ($bot, $message) {
            $bot->startConversation(new WelcomeConversation());
        });

        $botman->fallback(function ($bot) {
            $bot->reply('Lo siento, no entendí eso. ¿En qué puedo ayudarte?');
        });

        $botman->listen();
    }
}

class WelcomeConversation extends Conversation
{
    public function run()
    {
        $this->bot->typesAndWaits(2);
        $this->getCustomMessage();
        $this->askWhatToDo();
    }

    public function getCustomMessage()
    {
        if (auth()->user()) {
            $user = auth()->user();
            $this->say("Hola de nuevo, {$user->name}.");
        }
        else {
            $this->say("Hola, bienvenido a Nexus Play.");
        }
    }

    public function askWhatToDo()
    {
        $buttons = [
            Button::create('Ver juegos disponibles')->value('view-games'),
            Button::create('Información sobre el proceso de compra')->value('purchase-info'),
            Button::create('Jugar al Trivial')->value('play-trivial'),
            Button::create('Contactar con Nexus Play')->value('contact-us'),
            Button::create('Salir del menú')->value('exit'),
        ];

        $question = Question::create('¿Qué deseas hacer?')
            ->callbackId('ask_what_to_do')
            ->addButtons($buttons);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    case 'view-games':
                        $this->showAvailableGames();
                        break;
                    case 'purchase-info':
                        $this->providePurchaseInfo();
                        break;
                    case 'contact-us':
                        $this->contactNexusPlay();
                        break;
                    case 'exit':
                        $this->exitMenu();
                        break;
                    default:
                        $this->say('Lo siento, no te he entendido. ¿Puedes elegir una opción del menú?');
                        $this->askWhatToDo();
                        break;
                }
            } else {
                $this->say('Has vuelto a escribir sin pulsar un botón.');
            }
        });
    }

    public function showAvailableGames()
    {
        // Implementación para mostrar los juegos disponibles
        $this->say('Aquí se mostrarían los juegos disponibles.');
    }

    public function providePurchaseInfo()
    {
        // Implementación para proporcionar información sobre el proceso de compra
        $this->say('Aquí se proporcionaría información sobre el proceso de compra.');
    }

    public function contactNexusPlay()
    {
        // Implementación para contactar a Nexus Play
        $this->say('Aquí se proporcionarían detalles de contacto para Nexus Play.');
    }

    public function exitMenu()
    {
        // Implementación para contactar a Nexus Play
        $this->say('¡Hasta luego! Si necesitas algo más, aquí estaré.');
    }
}
