<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BodyInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BodyInvoices',function (Blueprint $table){
            $table->integer('NroRegi');
            $table->integer('FKRmtInvoice')->unsigned();
            $table->foreign('FKRmtInvoice')->references('RmtInvoice')->on('HeadInvoices');
            $table->decimal('QuaInvoice',20,0);
            $table->decimal('PriceUnit',28,4);
            $table->decimal('Subtotal',28,4);
            $table->decimal('DiscoUnit',28,4);
            $table->decimal('ValIva',28,4);
            $table->decimal('TotalItem',28,4);
            $table->integer('FKIdProduct')->unsigned();
            $table->foreign('FKIdProduct')->references('IdProduct')->on('Products');
            $table->integer('FKIdWareHouse')->unsigned();
            $table->foreign('FKIdWareHouse')->references('IdWareHouse')->on('WareHouses');
            $keys = array('NroRegi','FKRmtInvoice');
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
        Schema::dropIfExists('BodyInvoices');
    }
}
