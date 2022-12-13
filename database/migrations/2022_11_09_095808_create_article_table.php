<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('image1');
            $table->text('first_detail_first_part');
            $table->text('first_detail_second_part');
            $table->text('image2');
            $table->text('second_detail_first_part');
            $table->text('second_detail_second_part');
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
        Schema::dropIfExists('article');
    }
}
