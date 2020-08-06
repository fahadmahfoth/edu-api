<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{

    protected $table = 'schools';
    protected $fillable = [
        'name', 'image', 'location_lat',
        'location_lng','facebook','description','created_at','updated_at'
    ];


    public function department()
    {

        return $this->belongsToMany('App\Department','schools_departments','school_id','department_id');

    }

   



}
