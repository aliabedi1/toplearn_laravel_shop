<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('username');
            $table->string('password');
            $table->string('mobile_number');
            $table->string('email');
            $table->text('image');
            $table->decimal('balance',20,3);
            $table->smallInteger('type')->default(0)->comment('0 => normal , 1 => admin');
            $table->foreignId('expertise_id')->nullable()->constrained('expertise')->onDelete('cascade')->onUpdate('cascade');
            $table->string('bank_account_number');
            $table->smallInteger('appointment_permission')->default(0)->comment('0 => cant , 1 => can');
            $table->smallInteger('post_permission')->default(0)->comment('0 => cant , 1 => can');
            $table->smallInteger('setting_permission')->default(0)->comment('0 => cant , 1 => can');
            $table->smallInteger('checkout_permission')->default(0)->comment('0 => cant , 1 => can');
            $table->decimal('appointment_price',20,3);
            $table->string('serial');
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
        Schema::dropIfExists('user');
    }
}
