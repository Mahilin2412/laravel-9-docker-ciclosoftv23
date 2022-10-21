<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WareHouses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('WareHouses', function (Blueprint $table){
            $table->increments('IdWareHouse');
            $table->string('ReferenceWareHouse',10);
            $table->string('Name',50);
            $table->boolean('StatusWareHouse')->default(false);
            $table->integer('FKIdUserMan')->unsigned();
            $table->foreign('FKIdUserMan')->references('IdUser')->on('users');
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
        Schema::dropIfExists('WareHouses');
    }
}
