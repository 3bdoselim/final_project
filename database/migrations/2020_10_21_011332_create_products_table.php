<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string("product_name");
            $table->foreignId("product_size")->constrained("sizes");
            $table->foreignId("product_color")->constrained("colors");
            $table->integer("product_price");
            $table->string("product_brand")->nullable();
            $table->date("product_release_date");
            $table->date("product_end_date")->nullable();
            $table->integer("product_offer")->nullable();
            $table->foreignId("category_id");
            $table->foreign("category_id")->references("id")->on("categories")->unsigned();
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
}
