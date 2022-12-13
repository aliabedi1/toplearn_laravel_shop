<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('amount',20,3)->nullable()->comment('toman');
            $table->integer('delivery_time');
            $table->string('delivery_time_unit')->comment('hour or day or...');
            $table->tinyInteger('status')->default(0)->comment('0 => active , 1 => inactive');
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
        Schema::dropIfExists('delivery');
    }
}
