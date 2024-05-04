<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'front_page', 'developer', 'genre', 'base_price'];

    public function editions()
    {
        return $this->hasMany(Edition::class);
    }
}
