<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Departments extends Migration
{



    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('colleges');
            $table->text('description');
            $table->string('info_file');
            $table->timestamps();
        });
    }

    



    public function down()
    {
        Schema::dropIfExists('departments');
    }
    
}




