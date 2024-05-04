<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'plus', 'platform_group_id'];

    public function group()
    {
        return $this->belongsTo(PlatformGroup::class, 'platform_group_id');
    }

    public function editions()
    {
        return $this->hasMany(Edition::class);
    }
}
