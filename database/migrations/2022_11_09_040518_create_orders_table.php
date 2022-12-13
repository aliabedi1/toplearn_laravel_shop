<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('address_id')->nullable()->constrained('addresses')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('address_object')->nullable()->comment('save them for when user changed then address_id');
            $table->foreignId('payment_id')->nullable()->constrained('payments')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('payment_object')->nullable()->comment('save them for when user changed the payment_id');
            $table->tinyInteger('payment_type')->default(0);
            $table->tinyInteger('payment_status')->default(0);
            $table->foreignId('delivery_id')->nullable()->constrained('delivery')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('delivery_object')->nullable()->comment('save them for when user changed the delivery_id');
            $table->decimal('delivery_amount',20,3)->nullable()->comment('toman');
            $table->tinyInteger('delivery_status')->default(0);
            $table->timestamp('delivery_date');
            $table->decimal('order_final_amount',20,3)->nullable()->comment('toman -  how much user payed');
            $table->decimal('order_discount_amount',20,3)->nullable()->comment('toman -  how much user used discount');
            $table->foreignId('copan_id')->nullable()->constrained('copans')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('copan_object')->nullable()->comment('save them for when user changed the copan_id');
            $table->decimal('order_copan_discount_amount',20,3)->nullable()->comment('toman -  how much user used discount with this code_id');
            $table->foreignId('common_discount_id')->nullable()->constrained('common_discount')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('common_discount_object')->nullable()->comment('save them for when user changed the common_discount_id');
            $table->decimal('common_discount_amount',20,3)->nullable()->comment('toman -  how much user used discount with this common_discount_id');
            $table->decimal('order_total_products_discount_amount',20,3)->nullable()->comment('toman -  how much user didnt pay at all with all discount codes');
            $table->tinyInteger('order_status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
