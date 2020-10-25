<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagiciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magicians', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->unique();
            $table->foreignId('user_id');
            $table->string('image_url')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('magicians');
    }
}
