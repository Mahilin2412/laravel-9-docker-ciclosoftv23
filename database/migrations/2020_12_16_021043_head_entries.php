<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HeadEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HeadEntries',function (Blueprint $table){
            $table->increments('RmtEntry');
            $table->date('CreationDate');
            $table->String('DescriptionEntry',100);
            $table->decimal('Subtotal',28,4);
            $table->decimal('CostIVA',28,4);
            $table->decimal('TotalCost',28,4);
            $table->integer('FKIdProvider')->unsigned();
            $table->foreign('FKIdProvider')->references('IdProvider')->on('Providers');
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
        Schema::dropIfExists('HeadEntries');
    }
}
