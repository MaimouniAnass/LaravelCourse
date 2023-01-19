<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Login extends User
{
    use HasFactory;
    public $table = "login";
    protected $fillable = [
        "name",
        "email",
        "password"
    ];
    protected $hidden = [];
    public $timestambs = false;
}
