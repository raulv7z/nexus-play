<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function deleting(User $user) {
        foreach ($user->reviews as $review) {
            $review->delete();
        }
    }
}
