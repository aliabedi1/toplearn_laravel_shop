<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->string('date',20);
            $table->string('year',5);
            $table->string('month',4);
            $table->string('day_number',4);
            $table->string('month_name',20)->comment('in persian');
            $table->string('day_name',20)->comment('in persian');
            $table->string('clock',10);
            $table->integer('timestamp')->comment('for sort');
            $table->foreignId('user_id')->nullable()->constrained('user');
            $table->string('fullname',100);
            $table->string('user_mobile_number',100);
            $table->string('reserved_time',100);
            $table->string('reserved_date',100);
            $table->decimal('reserved_price',20,3);
            $table->foreignId('barber_id')->constrained('user')->onDelete('cascade')->onUpdate('cascade');
            $table->smallInteger('status')->default(1)->comment('0 => not showing in list');
            $table->smallInteger('reserved')->default(0)->comment('1 => reserved');
            $table->integer('freeze_timestamp');
            $table->integer('cancel_timestamp');
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
        Schema::dropIfExists('appointment');
    }
}
