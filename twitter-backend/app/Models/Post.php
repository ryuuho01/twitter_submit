<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // use HasFactory;
    protected $table = 'posts';
    protected $guarded = array('id');
    public static $rules = array(
        'client_id' => 'required',
        'post' => 'required|max:120',
    );

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function getnameData()
    {
        return $this->client->name;
    }
}
