<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id()->unique()->auto_increment();          // primary key
            $table->timestamps(); 
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
           
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }

};
