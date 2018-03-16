<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->tinyInteger('category_id')->nullable();
            $table->tinyInteger('brand_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->float('price')->default(0);
            $table->float('old_price')->default(0);
            $table->enum('status', ['0', '1']);
            $table->string('img')->default('no_image.jpg');
            $table->enum('hit', ['0', '1']);
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
