<?php

namespace App\Observers;

use App\Models\Videogame;
use Exception;

class VideogameObserver
{
    /**
     * Handle the Videogame "creating" event.
     */
    public function creating(Videogame $videogame): void
    {
        $this->calculateAmount($videogame);
    }

    /**
     * Handle the Videogame "deleting" event.
     */
    public function deleting(Videogame $videogame) {
        foreach ($videogame->editions as $edition) {
            $edition->delete();
        }
    }

    /**
     * Handle the Videogame "updating" event.
     */
    public function updating(Videogame $videogame): void
    {
        $this->calculateAmount($videogame);
    }

    protected function calculateAmount(Videogame $videogame)
    {
        // Asegúrate de que 'iva' no sea nulo para evitar errores
        $iva = $videogame->iva ?? 0;
        $videogame->sale_amount = $videogame->base_amount + ($videogame->base_amount * ($iva / 100));
    }
}
