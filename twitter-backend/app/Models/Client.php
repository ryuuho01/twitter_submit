<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Client extends Model
{
    // use HasFactory;
    protected $table = 'clients';
    protected $guarded = array('id');
    public static $rules = array(
        'name' => 'required',
        'email' => 'required',
    );

    public function getData()
    {
        return $this->id;
    }

    public function posts(){
     return $this->hasMany('App\Models\Post');
    }
    public function comments(){
     return $this->hasMany('App\Models\Comment');
    }
    public function likes(){
     return $this->hasMany('App\Models\Like');
    }
}
