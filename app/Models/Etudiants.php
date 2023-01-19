<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiants extends Model
{
    use HasFactory;
    public $table = "etudiants";
    protected $fillable = [
        "name",
        "email",
        "password"
    ];
    protected $hidden = [
        "created_at",
        "updated_at"
    ];
    public function notesEtudiants(){
        # return one element in table
        // return $this->hasOne(Notes::class,'id_etu');
        # return many element in table
         return $this->hasMany(Notes::class,'id_etu');    
    }
}
 	 	