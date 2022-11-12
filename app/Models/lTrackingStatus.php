<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class lTrackingStatus extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "tracking_status";
    protected $primaryKey = "id";


}
