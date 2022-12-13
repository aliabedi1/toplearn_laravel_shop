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
            $table->string('name');
            $table->text('introduction');
            $table->string('slug')->unique()->nullable();
            $table->text('image');
            $table->decimal('weight',10,2);
            $table->string('weight_unit');
            $table->decimal('length',10,1)->comment('cm unit');
            $table->decimal('width',10,1)->comment('cm unit');
            $table->decimal('height',10,1)->comment('cm unit');
            $table->decimal('price',20,3)->comment('toman');
            $table->tinyInteger('status')->default(0)->comment('0 => active , 1 => inactive');
            $table->tinyInteger('marketable')->default(0)->comment('0 => not marketable , 1 => marketable');
            $table->string('tags');
            $table->tinyInteger('sold_number')->default(0)->comment('sold count');
            $table->tinyInteger('frozen_number')->default(0)->comment('count when person is buying');
            $table->tinyInteger('marketable_number')->default(0)->comment('how many of them you want to sell');
            $table->foreignId('brand_id')->constrained('brands')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('product_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('published_at');
            $table->timestamps();
            $table->softDeletes();
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
