<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Edition;
use App\Models\Videogame;
use App\Models\Platform;

class EditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        // initialize compatibility array
        $compatibility = [
            'GTA V' => ['Steam', 'Epic Games', 'Rockstar Games', 'Play Station 3', 'Play Station 4', 'Play Station 5', 'X Box 360', 'X Box One', 'X Box Series X'],
            'The Witcher 3' => ['Steam', 'Epic Games', 'Play Station 4', 'Play Station 5', 'X Box One', 'X Box Series X'],
            'Minecraft' => ['Steam', 'Nintendo Switch'],
            'Elden Ring' => ['Steam', 'Play Station 4', 'Play Station 5', 'X Box One', 'X Box Series X'],
            'Cyberpunk 2077' => ['Steam', 'Epic Games', 'Play Station 4', 'Play Station 5', 'X Box One', 'X Box Series X'],
            'FIFA 23' => ['Steam', 'Play Station 4', 'Play Station 5', 'X Box One', 'X Box Series X', 'Nintendo Switch'],
            'Call of Duty: Modern Warfare' => ['Steam', 'Play Station 4', 'Play Station 5', 'X Box One', 'X Box Series X'],
            'Dark Souls III' => ['Steam', 'Play Station 4', 'X Box One'],
            'Legend of Zelda: Breath of the Wild' => ['Nintendo Switch'],
            'Red Dead Redemption 2' => ['Steam', 'Rockstar Games', 'Play Station 4', 'Play Station 5', 'X Box One', 'X Box Series X']
        ];

        // extract all platforms
        $platforms = Platform::all()->keyBy('name');

        // iterate on each game from the compatibility array
        foreach ($compatibility as $gameName => $platformNames) {
            $videogame = Videogame::where('name', $gameName)->first();
            if (!$videogame) {
                continue;
            }

            foreach ($platformNames as $platformName) {
                if (isset($platforms[$platformName])) {
                    $platform = $platforms[$platformName];

                    // calculate the amount based on the platform plus + the videogame base price
                    // $editionPrice = $videogame->base_price * (1 + $platform->plus); //! not needed if boot() is called on model
                    $editionPrice = 0;
                    
                    Edition::create([
                        'platform_id' => $platform->id,
                        'videogame_id' => $videogame->id,
                        // 'amount' => $editionPrice,
                        'stock' => 100  // modifiable
                    ]);
                }
            }
        }
    }
}
