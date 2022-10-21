<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Stock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Stock',function (Blueprint $table){
            $table->increments('IdStock');
           $table->decimal('CanStock',20,0);
           $table->integer('FKIdProduct')->unsigned();
           $table->foreign('FKIdProduct')->references('IdProduct')->on('Products');
           $table->integer('FKIdWareHouse')->unsigned();
           $table->foreign('FKIdWareHouse')->references('IdWareHouse')->on('WareHouses');
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
        Schema::dropIfExists('Stock');
    }
}
