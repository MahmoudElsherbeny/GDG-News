<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopularnewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popularnews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('section');
            $table->text('image');
            $table->text('title');
            $table->text('description');
            $table->text('out_description');
            $table->tinyInteger('active');
            $table->string('journalist');
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
        Schema::dropIfExists('popularnews');
    }
}
