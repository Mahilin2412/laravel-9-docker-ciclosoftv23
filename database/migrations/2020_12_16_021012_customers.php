<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Customers',function(Blueprint $table){
            $table->increments('IdCustomer');
            $table->String('FirstNameCustomer',20);
            $table->String('SecondNameCustomer',20)->nullable();
            $table->String('LastNameCustomer',20);
            $table->String('SecondLastNameCustomer',20)->nullable();
            $table->String('password',15); // minusculas por temas de jetstream
            $table->String('mail',50); // minusculas por temas de jetstream
            $table->String('Address',45);
                $table->String('AddressEntry',45);
                $table->String('NumberPhone',15);
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
        Schema::dropIfExists('Customers');
    }
}
