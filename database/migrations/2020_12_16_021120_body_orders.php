<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BodyOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BodyOrders',function (Blueprint $table){
            $table->integer('NroRegi');
            $table->integer('FKRmtOrder')->unsigned();
            $table->foreign('FKRmtOrder')->references('RmtOrder')->on('HeadOrders');
            $table->decimal('QuanOrder',20,0);
            $table->decimal('PriceUnit',28,4);
            $table->decimal('Subtotal',28,4);
            $table->decimal('Discount',28,4);
            $table->decimal('ValIva',28,4);
            $table->decimal('TotalPrice',28,4);
            $table->integer('FKIdProduct')->unsigned();
            $table->foreign('FKIdProduct')->references('IdProduct')->on('Products');
            $keys = array('NroRegi', 'FKRmtOrder');
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
        Schema::dropIfExists('BodyOrders');
    }
}
