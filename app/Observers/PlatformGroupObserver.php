<?php

namespace App\Observers;

use App\Models\PlatformGroup;

class PlatformGroupObserver
{
    public function deleting(PlatformGroup $platformGroup) {
        foreach ($platformGroup->platforms as $platform) {
            $platform->delete();
        }
    }
}
