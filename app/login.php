<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'password'];
}
