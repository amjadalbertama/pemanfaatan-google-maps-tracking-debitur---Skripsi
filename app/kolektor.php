<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;



class kolektor extends Authenticatable
{

    use Notifiable;
    protected $table = 'kolektor';
    protected $primaryKey = 'id';
    // protected $fillable = ['kolektor_nama', 'kolektor_nomor', 'kolektor_email', 'kolektor_status', 'latitude', 'longitude', 'password'];


    protected $fillable = ['name', 'kolektor_nomor', 'kolektor_email', 'kolektor_status', 'latitude', 'longitude', 'password'];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
