<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Providers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Providers',function(Blueprint $table){
            $table->increments('IdProvider');
            $table->String('FirstNameProvider',20);
            $table->String('SecondNameProvider',20)->nullable();
            $table->String('FirstLastNameProvider',20);
            $table->String('SecondLastNameProvider',20)->nullable();
            $table->Boolean('StatusProvider')->default(false);;
            $table->integer('FKIdThird')->unsigned();
            $table->foreign('FKIdThird')->references('IdThird')->on('Thirds');
            $table->integer('FKIdUser')->unsigned();
            $table->foreign('FKIdUser')->references('IdUser')->on('users');
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
        Schema::dropIfExists('Providers');
    }
}
