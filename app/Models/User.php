<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	public function providers() {
		return $this->hasMany(Provider::class, 'user_id', 'id');
	}

	public function sendPasswordResetNotification($token) {
		// url disini adalah link url dari website yang nantinya terintegrasi dengan api ini
		$url = 'http://localhost:8000/reset-password?token='. $token;

		$this->notify(new ResetPasswordNotification($url));
	}
	
}
