<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrameworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frameworks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->string('name');
            $table->string('summary');
            $table->longText('description');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_active')->default(1);
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages');
        });

        Schema::disableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frameworks');
    }
}
