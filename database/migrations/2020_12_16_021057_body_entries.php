<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BodyEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BodyEntries',function (Blueprint $table){
           $table->integer('NroReg');
           $table->integer('FKRmtEntry')->unsigned();
           $table->foreign('FKRmtEntry')->references('RmtEntry')->on('HeadEntries');
           $table->decimal('CostUnit',28,4);
           $table->decimal('QuanEntry',20,0);
           $table->decimal('Subtotal',28,4);
           $table->integer('FKIdWareHouse')->unsigned();
            $table->foreign('FKIdWareHouse')->references('IdWareHouse')->on('WareHouses');
           $table->integer('FKIdProduct')->unsigned();
           $table->foreign('FKIdProduct')->references('IdProduct')->on('Products');
           $table->integer('FKIdUser')->unsigned();
           $table->foreign('FKIdUser')->references('IdUser')->on('users');
           $keys = array('NroReg', 'FKRmtEntry');
           $table->primary($keys);
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
        Schema::dropIfExists('BodyEntries');
    }
}
