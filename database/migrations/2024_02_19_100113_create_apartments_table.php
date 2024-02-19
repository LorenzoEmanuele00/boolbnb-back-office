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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->string('title')->unique();
            $table->string('slug');
            $table->decimal('price', 8, 2)->unsigned();
            $table->string('address');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->tinyInteger('dimension_mq');
            $table->tinyInteger('rooms_number');
            $table->tinyInteger('beds_number');
            $table->tinyInteger('bathrooms_number');
            $table->boolean('is_visible')->default(1);
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
        Schema::dropIfExists('apartments');
    }
};
