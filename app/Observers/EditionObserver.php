<?php

namespace App\Observers;

use App\Models\Edition;
use Exception;

class EditionObserver
{
    /**
     * Handle the Edition "creating" event.
     */
    public function creating(Edition $edition): void
    {
        $this->calculateAmount($edition);
    }

    /**
     * Handle the Edition "updating" event.
     */
    public function updating(Edition $edition): void
    {
        $this->calculateAmount($edition);
    }

    protected function calculateAmount(Edition $edition)
    {
        $platform = $edition->platform;
        $videogame = $edition->videogame;

        if (!$platform || !$videogame) {
            throw new Exception('Cannot calculate amount: Platform or Videogame is missing.');
        }

        $edition->amount = $videogame->base_price * (1 + $platform->plus);
    }
}
