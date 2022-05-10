<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Controllers\VehiclesController;

class Vehicle extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'model',
        'make',
        'yearofmanufacture',
        'bookingamount',
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
