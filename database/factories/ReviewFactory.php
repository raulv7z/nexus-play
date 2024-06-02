<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use App\Models\Edition;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->random();
        $edition = Edition::all()->random();
        $rating = $this->faker->numberBetween(1, 5);
        $verified = $user->hasBoughtEdition($edition->id) ? 1 : 0;

        // Realistic comments in English and Spanish, grouped by feelings

        $positiveComments = [
            [
                'en' => 'Absolutely phenomenal game! The story is captivating, the graphics are stunning, and the gameplay is immersive.',
                'es' => '¡Juego absolutamente fenomenal! La historia es cautivadora, los gráficos son impresionantes y la jugabilidad es inmersiva.',
            ],
            [
                'en' => 'A masterpiece of a game! Every aspect is meticulously crafted, from the character development to the game world design.',
                'es' => '¡Una obra maestra de juego! Cada aspecto está meticulosamente elaborado, desde el desarrollo de los personajes hasta el diseño del mundo del juego.',
            ],
            [
                'en' => 'Incredible experience from start to finish. I couldn\'t tear myself away from the screen!',
                'es' => '¡Increíble experiencia de principio a fin. ¡No podía apartar la vista de la pantalla!',
            ],
            [
                'en' => 'A true gem in the gaming world. I\'ve never felt so emotionally invested in a game before.',
                'es' => 'Una verdadera joya en el mundo de los videojuegos. Nunca antes me había sentido tan emocionalmente involucrado en un juego.',
            ],
            [
                'en' => 'Epic adventure! The game world is vast and filled with secrets to uncover. I highly recommend exploring every corner.',
                'es' => '¡Aventura épica! El mundo del juego es vasto y está lleno de secretos por descubrir. Recomiendo explorar cada rincón.',
            ],
            [
                'en' => 'Phenomenal storytelling! The narrative kept me engaged from start to finish, with plenty of unexpected twists along the way.',
                'es' => '¡Narrativa fenomenal! La historia me mantuvo comprometido de principio a fin, con un montón de giros inesperados en el camino.',
            ],
            [
                'en' => 'An unforgettable experience! This game will stay with me for a long time. Kudos to the developers for creating such a masterpiece.',
                'es' => '¡Una experiencia inolvidable! Este juego permanecerá conmigo durante mucho tiempo. Felicitaciones a los desarrolladores por crear una obra maestra así.',
            ],
            [
                'en' => 'Immersive gameplay! I felt like I was part of the game world, with each decision having real consequences.',
                'es' => '¡Jugabilidad inmersiva! Sentí que era parte del mundo del juego, con cada decisión teniendo consecuencias reales.',
            ],
            [
                'en' => 'Highly recommended! This game is a must-play for any gaming enthusiast. It sets a new standard for excellence in gaming.',
                'es' => '¡Altamente recomendado! Este juego es imprescindible para cualquier entusiasta de los videojuegos. Establece un nuevo estándar de excelencia en los videojuegos.',
            ],
            [
                'en' => 'A true masterpiece of interactive storytelling. This game raises the bar for what games can achieve as an art form.',
                'es' => 'Una verdadera obra maestra de narrativa interactiva. Este juego eleva el listón de lo que los juegos pueden lograr como forma de arte.',
            ],
        ];

        $negativeComments = [
            [
                'en' => 'I found this game to be disappointing. The graphics were outdated and the gameplay felt repetitive.',
                'es' => 'Encontré este juego decepcionante. Los gráficos estaban desactualizados y la jugabilidad se sentía repetitiva.',
            ],
            [
                'en' => 'Not worth the hype. The storyline lacked depth and the mechanics were clunky.',
                'es' => 'No vale la pena la hype. La historia carecía de profundidad y los mecanismos eran torpes.',
            ],
            [
                'en' => 'I expected more from this game. It fell short in terms of both gameplay and narrative.',
                'es' => 'Esperaba más de este juego. Se quedó corto en cuanto a jugabilidad y narrativa.',
            ],
            [
                'en' => 'Disappointing experience overall. The controls were unresponsive and the AI felt scripted.',
                'es' => 'Experiencia decepcionante en general. Los controles eran lentos y la IA parecía predecible.',
            ],
            [
                'en' => 'The game felt unfinished. Bugs and glitches were rampant, detracting from the overall experience.',
                'es' => 'El juego se sentía inacabado. Los errores y fallos eran frecuentes, lo que restaba valor a la experiencia.',
            ],
            [
                'en' => 'I regret purchasing this game. It failed to deliver on its promises and left me feeling unsatisfied.',
                'es' => 'Lamento haber comprado este juego. No cumplió con sus promesas y me dejó insatisfecho.',
            ],
            [
                'en' => 'Poorly optimized. Performance issues made the game nearly unplayable at times.',
                'es' => 'Mal optimizado. Los problemas de rendimiento hacían que el juego fuera casi injugable en ocasiones.',
            ],
            [
                'en' => 'The game felt rushed. It lacked polish and the story was full of plot holes.',
                'es' => 'El juego se sintió apresurado. Carecía de pulido y la historia estaba llena de agujeros argumentales.',
            ],
            [
                'en' => 'Not recommended. Save your money for something better.',
                'es' => 'No recomendado. Ahorra tu dinero para algo mejor.',
            ],
            [
                'en' => 'Underwhelming experience. It failed to capture my interest and left me wanting more.',
                'es' => 'Experiencia decepcionante. No logró capturar mi interés y me dejó con ganas de más.',
            ],
        ];

        // Select a random comment based on the rating for set a negative or positive feedback

        $comments = $rating > 3 ? $positiveComments : $negativeComments;
        $comment = $this->faker->randomElement($comments);

        return [
            'user_id' => $user->id,
            'edition_id' => $edition->id,
            'rating' => $rating,
            'comment' => $comment,
            'verified' => $verified,
        ];
    }
}
