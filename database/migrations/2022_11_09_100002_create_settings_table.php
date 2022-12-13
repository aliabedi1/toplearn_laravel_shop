<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('mobile_number',25);
            $table->string('telephone_number',25);
            $table->text('address');
            $table->text('description');
            $table->text('telegram_link');
            $table->text('instagram_link');
            $table->text('whatsapp_link');
            $table->string('email');
            $table->text('google_map_link');
            $table->decimal('minimum_charge_balance',20,3);
            $table->text('logo_image');
            $table->text('after_slideshow_detail');
            $table->text('after_slideshow_image');
            $table->decimal('deposit_amount',20,3)->default(0);
            $table->integer('cancel_appointment_days')->default(0)->min(0);
            $table->string('wroking_time_detail');
            $table->string('wroking_days_detail');
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
        Schema::dropIfExists('settings');
    }
}
