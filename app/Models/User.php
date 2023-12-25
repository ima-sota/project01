<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_name', 'user_email', 'user_password', 'user_role'
    ];

    protected $hidden = [
        'user_password', 'remember_token',
    ];


    // カスタムカラム名を使用するためのアクセサ
    public function getEmailAttribute()
    {
        return $this->attributes['user_email'];
    }

    public function getPasswordAttribute()
    {
        return $this->attributes['user_password'];
    }
}
