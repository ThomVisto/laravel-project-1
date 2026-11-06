<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

protected [Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    
    use HasFactory, Notifiable;
    protected [Fillable(['name', 'email', 'password','role' 'provider_id'])]
    protected $casts = ['password' => 'hashed'];
    const Role_Customer = 'customer', Role_Provider='provider',Role_Admin='admin';

    
}
