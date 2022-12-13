<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->text('body');
            $table->text('image');
            $table->foreignId('author_id')->constrained('user')->onDelete('cascade')->onUpdate('cascade');            
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
        Schema::dropIfExists('top_feedbacks');
    }
}
