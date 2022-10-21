<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('IdUser');
            $table->String('FirstName', 20);
            $table->String('SecondName', 20)->nullable();
            $table->String('FirstLastName', 20);
            $table->String('SecondLastName', 20)->nullable();
            $table->String('email', 50);
            $table->String('password', 200);
            $table->boolean('StatusUser');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
