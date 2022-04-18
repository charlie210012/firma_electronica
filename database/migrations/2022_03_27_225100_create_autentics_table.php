<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutenticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autentics', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('identifier');
            $table->integer('expeditionDate');
            $table->bigInteger('phone');
            $table->integer('birthdayDate');
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
        Schema::dropIfExists('autentics');
    }
}
