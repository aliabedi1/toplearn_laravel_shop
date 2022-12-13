<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_schedule', function (Blueprint $table) {
            $table->id();
            $table->string('start_time_morning');
            $table->string('end_time_morning');
            $table->string('start_time_afternoon');
            $table->string('end_time_afternoon');
            $table->smallInteger('sunday')->default(0)->comment('0 => inactive , 1 => active');
            $table->smallInteger('monday')->default(0)->comment('0 => inactive , 1 => active');
            $table->smallInteger('tuesday')->default(0)->comment('0 => inactive , 1 => active');
            $table->smallInteger('wednesday')->default(0)->comment('0 => inactive , 1 => active');
            $table->smallInteger('thursday')->default(0)->comment('0 => inactive , 1 => active');
            $table->smallInteger('friday')->default(0)->comment('0 => inactive , 1 => active');
            $table->smallInteger('saturday')->default(0)->comment('0 => inactive , 1 => active');
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
        Schema::dropIfExists('working_schedule');
    }
}
