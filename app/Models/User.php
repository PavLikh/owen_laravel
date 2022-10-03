<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable


// class User extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'password'];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }
}
