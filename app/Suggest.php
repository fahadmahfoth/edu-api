<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    protected $table = 'suggests';
    protected $fillable = [
        'name', 'email', 'message','created_at','updated_at'
        
    ];
}
