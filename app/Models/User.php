<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasRoles, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function pendingCart()
    {
        return $this->hasOne(Cart::class)->whereHas('cartState', function ($query) {
            $query->where('state->en', 'pending');
        });
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function hasBoughtEdition($editionId) : bool {

        $invoices = $this->invoices()->get();

        foreach ($invoices as $invoice) {
            foreach ($invoice->entries as $entry) {
                $id = $entry->edition->id ?? 0;

                if ($id == $editionId) {
                    return true;
                }
            }
        }

        return false;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}