<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tbl_products', function (Blueprint $table) { 
        $table->increments('product_id');
         $table->string('product_name'); 
         $table->integer('category_id'); 
         $table->integer('manufacture_id');
          $table->string('product_short_descreption'); 
          $table->longText('product_long_descreption'); 
          $table->float('product_prise'); 
          $table->string('product_image'); 
          $table->string('product_size');
           $table->string('product_color'); 
           $table->integer('publication_status'); 
           $table->timestamps(); });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_products');
    }
}
