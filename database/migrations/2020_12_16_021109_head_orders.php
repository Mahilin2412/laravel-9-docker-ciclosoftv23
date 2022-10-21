<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HeadOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HeadOrders',function (Blueprint $table){
            $table->increments('RmtOrder');
            $table->integer('NumOrder');
            $table->date('DateOrder');
            $table->char('StatusOrder',1);
            $table->decimal('Subtotal',28,4);
            $table->decimal('TotalIva',28,4);
            $table->decimal('TotalPrice',28,4);
            $table->integer('FKIdCustomer')->unsigned();
            $table->foreign('FKIdCustomer')->references('IdCustomer')->on('customers');
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
        Schema::dropIfExists('HeadOrders');
    }
}
