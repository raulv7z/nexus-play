<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Platform extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['platform_group_id', 'name', 'plus'];

    public function group()
    {
        return $this->belongsTo(PlatformGroup::class, 'platform_group_id');
    }

    public function editions()
    {
        return $this->hasMany(Edition::class);
    }
}
