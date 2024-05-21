<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'edition_id',
        'rating',
        'comment',
        'verified',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }
}