<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    use HasFactory;

    protected $fillable = ['platform_id', 'videogame_id', 'amount', 'stock'];

    public function videogame()
    {
        return $this->belongsTo(Videogame::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function cartEntries()
    {
        return $this->hasMany(CartEntry::class);
    }
}
