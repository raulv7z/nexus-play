<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Videogame extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = ['name', 'description', 'front_page', 'distributor', 'genre', 'iva', 'base_amount', 'sale_amount'];
    public $translatable = ['description', 'genre'];

    public function editions()
    {
        return $this->hasMany(Edition::class);
    }
}
