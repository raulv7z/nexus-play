<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function platforms()
    {
        return $this->hasMany(Platform::class);
    }

}
