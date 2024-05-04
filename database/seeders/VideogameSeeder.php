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
                'description' => 'Action-adventure game set in a virtual city.',
                'front_page' => 'gta-v-fpage.png',
                'developer' => 'Rockstar Games',
                'genre' => 'Action',
                'base_price' => 29.99,
            ],
            [
                'name' => 'The Witcher 3',
                'description' => 'Open world RPG in a fantasy setting.',
                'front_page' => 'witcher3-fpage.png',
                'developer' => 'CD Projekt Red',
                'genre' => 'RPG',
                'base_price' => 39.99,
            ],
            [
                'name' => 'Minecraft',
                'description' => 'Sandbox game that allows for building and exploration.',
                'front_page' => 'minecraft-fpage.png',
                'developer' => 'Mojang Studios',
                'genre' => 'Sandbox',
                'base_price' => 26.95,
            ],
            [
                'name' => 'Elden Ring',
                'description' => 'Action RPG set in a mystical world created by Hidetaka Miyazaki and George R. R. Martin.',
                'front_page' => 'elden-ring-fpage.png',
                'developer' => 'FromSoftware',
                'genre' => 'Action RPG',
                'base_price' => 59.99,
            ],
            [
                'name' => 'Cyberpunk 2077',
                'description' => 'Open-world RPG set in the dystopian Night City.',
                'front_page' => 'cyberpunk2077-fpage.png',
                'developer' => 'CD Projekt',
                'genre' => 'Action RPG',
                'base_price' => 49.99,
            ],
            [
                'name' => 'FIFA 23',
                'description' => 'The latest installment in the long-running football video game series by EA Sports.',
                'front_page' => 'fifa23-fpage.png',
                'developer' => 'EA Sports',
                'genre' => 'Sports',
                'base_price' => 59.99,
            ],
            [
                'name' => 'Call of Duty: Modern Warfare',
                'description' => 'First-person shooter with both single-player and multiplayer modes.',
                'front_page' => 'cod-mw-fpage.png',
                'developer' => 'Infinity Ward',
                'genre' => 'Shooter',
                'base_price' => 59.99,
            ],
            [
                'name' => 'Dark Souls III',
                'description' => 'Challenging action RPG known for its difficult combat and intricate world design.',
                'front_page' => 'dark-souls-iii-fpage.png',
                'developer' => 'FromSoftware',
                'genre' => 'Action RPG',
                'base_price' => 49.99,
            ],
            [
                'name' => 'Legend of Zelda: Breath of the Wild',
                'description' => 'Open-air adventure game that broke new ground for the action-adventure genre.',
                'front_page' => 'zelda-breath-fpage.png',
                'developer' => 'Nintendo',
                'genre' => 'Action Adventure',
                'base_price' => 59.99,
            ],
            [
                'name' => 'Red Dead Redemption 2',
                'description' => 'Epic tale of life in America’s unforgiving heartland by the makers of GTA V.',
                'front_page' => 'rdr2-fpage.png',
                'developer' => 'Rockstar Games',
                'genre' => 'Action Adventure',
                'base_price' => 59.99,
            ]
        ];

        foreach ($videogames as $game) {
            Videogame::create($game);
        }
    }
}
