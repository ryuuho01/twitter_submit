<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // use HasFactory;
    protected $table = 'likes';
    protected $guarded = array('id');
    public static $rules = array(
        // 'client_id' => 'required',
        'client_email' => 'required',
        'post_id' => 'required',
    );
    
    public function getLike(){
        return $this->like;
    }
}
