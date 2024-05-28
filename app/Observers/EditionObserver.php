<?php

namespace App\Observers;

use App\Models\Edition;
use App\Models\Review;
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

    /**
     * Handle the Edition "retrieved" event.
     */
    public function retrieved(Edition $edition): void
    {
        $this->calculateRating($edition);
    }
    

    protected function calculateRating(Edition $edition)
    {
        $reviews = $edition->reviews;

        // has reviews
        if ($reviews->isNotEmpty()) {
            $total = $reviews->reduce(fn($carry, $review) => $carry + $review->rating, 0);    
            $edition->rating = $total / $reviews->count();
            $edition->save();
        }
    }

    protected function calculateAmount(Edition $edition)
    {
        $platform = $edition->platform;
        $videogame = $edition->videogame;

        if (!$platform || !$videogame) {
            throw new Exception('Cannot calculate amount: Platform or Videogame is missing.');
        }

        $edition->amount = $videogame->sale_amount * (1 + $platform->plus);
    }
}
