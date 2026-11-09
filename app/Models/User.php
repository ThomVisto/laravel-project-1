
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Services advertised by this provider
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    // Bookings made by this customer
    public function bookings(): HasMany
    {
        return $this->hasMany(
            Booking::class,
            'customer_id'
        );
    }

    // Bookings received by this provider
    public function receivedBookings(): HasMany
    {
        return $this->hasMany(
            Booking::class,
            'provider_id'
        );
    }

    // Reviews written by this customer
    public function reviews(): HasMany
    {
        return $this->hasMany(
            Review::class,
            'customer_id'
        );
    }
}
