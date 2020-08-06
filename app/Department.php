<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $fillable = [
        'name', 'image', 'colleges','info_file','description','created_at','updated_at'
        
    ];


    public function curricula()
    {
        return $this->belongsToMany('App\Curricula', 'departments_curricula', 'department_id', 'curricula_id');
    }
}
