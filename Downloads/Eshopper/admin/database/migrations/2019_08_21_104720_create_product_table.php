<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use DB;
class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('sku',45);
            $table->string('short_description',100);
            $table->text('long_description');
            $table->float('price',14,2);
            $table->float('special_price',14,2);
            $table->date('special_price_from');
            $table->date('special_price_to');
            $table->string('status');
            $table->integer('quantity');
            $table->string('meta_title',45);
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->string('is_featured');
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
        Schema::dropIfExists('product');
    }
}
