<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HeadInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HeadInvoices',function (Blueprint $table){
            $table->increments('RmtInvoice');
            $table->integer('NumberInvoice');
            $table->date('DateInvoice');
            $table->decimal('TotalIva',28,4);
            $table->decimal('Subtotal',28,4);
            $table->decimal('TotalPrice',28,4);
            $table->integer('FKIdCustomer')->unsigned();
            $table->foreign('FKIdCustomer')->references('IdCustomer')->on('customers');
            $table->integer('FKIdPaymentType')->unsigned();
            $table->foreign('FKIdPaymentType')->references('IdPaymentType')->on('PaymentTypes');
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
        Schema::dropIfExists('HeadInvoices');
    }
}
