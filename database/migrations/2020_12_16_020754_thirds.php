<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Thirds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Thirds',function (Blueprint $table){
            $table->increments('IdThird');
            $table->string('NumIdentification', 30);
            $table->integer('FKIdTypeDoc')->unsigned();
            $table->foreign('FKIdTypeDoc')->references('IdTypeDoc')->on('DocumentTypes');
            $table->string('FirstNameThird', 20);
            $table->string('SecondNameThird', 20)->nullable();
            $table->string('LastNameThird', 20);
            $table->string('SecondLastNameThird', 20)->nullable();
            $table->string('NameComplete', 90);
            $table->boolean('ExistsCutomer')->default(false);
            $table->boolean('ExistsProvider')->default(false);
            $table->integer('FKIdGender')->unsigned();
            $table->foreign('FKIdGender')->references('IdGender')->on('Genders');
            $table->integer('FKIdUser')->unsigned();
            $table->foreign('FKIdUser')->references('IdUser')->on('users');
            $table->index(['NumIdentification','FKIdTypeDoc']);
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
        Schema::dropIfExists('Thirds');
    }
}
