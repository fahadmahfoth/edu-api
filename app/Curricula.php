<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curricula extends Model
{
    protected $table = 'curricula';
    protected $fillable = [
        'name', 'file', 'stage'
        
    ];
}
