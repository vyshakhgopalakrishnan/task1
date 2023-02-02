<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('product_name');
            $table->unsignedBigInteger('product_category');
            $table->foreign('product_category')  ->references('id')
            ->on('product_categories');
            $table->text('poduct_MRP');
            $table->text('poduct_selling_price');
            $table->unsignedBigInteger('variants');
            $table->foreign('variants')  ->references('id')
            ->on('variants');
            $table->text('description');
          

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
        Schema::dropIfExists('products');
    }
};
