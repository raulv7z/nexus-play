<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Videogame;

class VideogameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $videogames = [
            [
                'name' => 'GTA V',
                'description' => [
                    'en' => 'Action-adventure game set in a virtual city.',
                    'es' => 'Juego de acción y aventuras ambientado en una ciudad virtual.',
                ],
                'genre' => [
                    'en' => 'Action',
                    'es' => 'Acción',
                ],
                'front_page' => 'gta-v-fpage.png',
                'distributor' => 'Rockstar Games',
                'iva' => 21,
                'base_amount' => 29.99,
            ],
            [
                'name' => 'The Witcher 3',
                'description' => [
                    'en' => 'Open world RPG in a fantasy setting.',
                    'es' => 'RPG de mundo abierto en un entorno de fantasía.',
                ],
                'genre' => [
                    'en' => 'RPG',
                    'es' => 'RPG',
                ],
                'front_page' => 'witcher3-fpage.png',
                'distributor' => 'CD Projekt Red',
                'iva' => 21,
                'base_amount' => 39.99,
            ],
            [
                'name' => 'Minecraft',
                'description' => [
                    'en' => 'Sandbox game that allows for building and exploration.',
                    'es' => 'Juego libre que permite la construcción y exploración.',
                ],
                'genre' => [
                    'en' => 'Sandbox',
                    'es' => 'Juego libre',
                ],
                'front_page' => 'minecraft-fpage.png',
                'distributor' => 'Mojang Studios',
                'iva' => 21,
                'base_amount' => 26.95,
            ],
            [
                'name' => 'Elden Ring',
                'description' => [
                    'en' => 'Action RPG set in a mystical world created by Hidetaka Miyazaki and George R. R. Martin.',
                    'es' => 'RPG de acción ambientado en un mundo místico creado por Hidetaka Miyazaki y George R. R. Martin.',
                ],
                'genre' => [
                    'en' => 'Action RPG',
                    'es' => 'RPG de acción',
                ],
                'front_page' => 'elden-ring-fpage.png',
                'distributor' => 'FromSoftware',
                'iva' => 21,
                'base_amount' => 59.99,
            ],
            [
                'name' => 'Cyberpunk 2077',
                'description' => [
                    'en' => 'Open-world RPG set in the dystopian Night City.',
                    'es' => 'RPG de mundo abierto ambientado en la distópica Night City.',
                ],
                'genre' => [
                    'en' => 'Action RPG',
                    'es' => 'RPG de acción',
                ],
                'front_page' => 'cyberpunk2077-fpage.png',
                'distributor' => 'CD Projekt',
                'iva' => 21,
                'base_amount' => 49.99,
            ],
            [
                'name' => 'FIFA 23',
                'description' => [
                    'en' => 'The latest installment in the long-running football video game series by EA Sports.',
                    'es' => 'La última entrega de la larga serie de videojuegos de fútbol de EA Sports.',
                ],
                'genre' => [
                    'en' => 'Sports',
                    'es' => 'Deportes',
                ],
                'front_page' => 'fifa23-fpage.png',
                'distributor' => 'EA Sports',
                'iva' => 21,
                'base_amount' => 59.99,
            ],
            [
                'name' => 'Call of Duty: Modern Warfare',
                'description' => [
                    'en' => 'First-person shooter with both single-player and multiplayer modes.',
                    'es' => 'Juego de disparos en primera persona con modos para un solo jugador y multijugador.',
                ],
                'genre' => [
                    'en' => 'Shooter',
                    'es' => 'Disparos',
                ],
                'front_page' => 'cod-mw-fpage.png',
                'distributor' => 'Infinity Ward',
                'iva' => 21,
                'base_amount' => 59.99,
            ],
            [
                'name' => 'Dark Souls III',
                'description' => [
                    'en' => 'Challenging action RPG known for its difficult combat and intricate world design.',
                    'es' => 'RPG de acción desafiante conocido por su combate difícil y su intrincado diseño de mundo.',
                ],
                'genre' => [
                    'en' => 'Action RPG',
                    'es' => 'RPG de acción',
                ],
                'front_page' => 'dark-souls-iii-fpage.png',
                'distributor' => 'FromSoftware',
                'iva' => 21,
                'base_amount' => 49.99,
            ],
            [
                'name' => 'Legend of Zelda: Breath of the Wild',
                'description' => [
                    'en' => 'Open-air adventure game that broke new ground for the action-adventure genre.',
                    'es' => 'Juego de aventuras al aire libre que abrió nuevos horizontes para el género de aventuras y acción.',
                ],
                'genre' => [
                    'en' => 'Action Adventure',
                    'es' => 'Aventura y acción',
                ],
                'front_page' => 'zelda-breath-fpage.png',
                'distributor' => 'Nintendo',
                'iva' => 21,
                'base_amount' => 59.99,
            ],
            [
                'name' => 'Red Dead Redemption 2',
                'description' => [
                    'en' => 'Epic tale of life in America’s unforgiving heartland by the makers of GTA V.',
                    'es' => 'Épica historia de la vida en el implacable corazón de Estados Unidos creada por los fabricantes de GTA V.',
                ],
                'genre' => [
                    'en' => 'Action Adventure',
                    'es' => 'Aventura y acción',
                ],
                'front_page' => 'rdr2-fpage.png',
                'distributor' => 'Rockstar Games',
                'iva' => 21,
                'base_amount' => 59.99,
            ],
        ];

        foreach ($videogames as $game) {
            $videogame = new Videogame([
                'name' => $game['name'],
                'description' => $game['description'],
                'genre' => $game['genre'],
                'front_page' => $game['front_page'],
                'distributor' => $game['distributor'],
                'iva' => $game['iva'],
                'base_amount' => $game['base_amount'],
            ]);
        
            $videogame->save();
        }
        
    }
}
