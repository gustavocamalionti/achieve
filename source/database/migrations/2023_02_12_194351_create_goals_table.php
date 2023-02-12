<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('users_id');
            $table->integer('priority')->default('1');
            $table->string('name',255);
            $table->integer('amount');
            $table->decimal('value',15,2);
            $table->datetime('date_goal');
            $table->string('note', 255);
            $table->string('image', 100);
            $table->timestamps();
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goals');
    }
};
