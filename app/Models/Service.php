<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
      protected $fillable = ['service_id','review_id','service','price'];
    public function review() { return $this->belongsTo(Review::class); }
}
