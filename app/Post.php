<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title', 'description', 'user_id'];

    //relacion de uno a muchos en posteo muchos posteos pertenecen a un usuario
    public function user(){
        return $this->belongsTo('App\User');//llamamos al modelo
    }
}
