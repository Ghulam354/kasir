<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class usersModel extends Model

{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'password',
        'fullname',
        'phone_number',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    // hash pw
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}