<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Products',function (Blueprint $table){
            $table->increments('IdProduct');
            $table->string('NameProduct',50);
            $table->string('Reference',15);
            $table->boolean('ManIva')->default(false);
            $table->decimal('PorIva',28,4);
            $table->decimal('PorDesc',5,2);
            $table->decimal('Price',28,4);
            $table->boolean('StatusProduct')->default(false);
            $table->text('Description');
            $table->String('imageProduct',400)->nullable();
            //$table->char('Clasification',1); SE QUITO EL CAMPO
            $table->integer('FKIdTypeProduct')->unsigned();
            $table->foreign('FKIdTypeProduct')->references('IdTypeProduct')->on('ProductCategories');
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
    public function down(){
        Schema::dropIfExists('Products');
    }
}
