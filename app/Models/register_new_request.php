<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class register_new_request extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "register_new_request";
    protected $primaryKey = "id";


}
