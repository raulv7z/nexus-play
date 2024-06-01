<?php

namespace App\Observers;

use App\Models\Platform;

class PlatformObserver
{
    public function deleting(Platform $platform) {
        foreach ($platform->editions as $edition) {
            $edition->delete();
        }
    }
}
