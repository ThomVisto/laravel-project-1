
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'price',
        'duration_minutes',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'duration_minutes' => 'integer',
        ];
    }

    // The provider who created this service
    public function provider(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // The category this service belongs to
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // All bookings for this service
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    // Reviews for this service
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
