<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   protected $fillable = ['customer_id','service_id','status',,'paystack_reference','idempotency_key',];
    public function customer() { return $this->belongsTo(User::class, 'customer_id'); }
    public function service_id() { return $this->hasMany(Service::class); }
}
