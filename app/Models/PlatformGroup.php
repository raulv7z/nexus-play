<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlatformGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function platforms()
    {
        return $this->hasMany(Platform::class);
    }

}
