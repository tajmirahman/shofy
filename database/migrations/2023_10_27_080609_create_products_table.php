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

            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_image');
            $table->string('brand_name')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->text('short_descp')->nullable();
            $table->text('long_descp')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('stock')->nullable();
            $table->integer('category_id');
            $table->integer('vendor_id')->nullable();
            $table->integer('subcategory_id');
            $table->integer('hot_deal')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('best_seeling')->nullable();
            $table->integer('new')->nullable();
            $table->integer('status')->default(0);

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
