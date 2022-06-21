<?php

use App\Models\Business;
use App\Models\firma;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Passport\Client;

class CreateTokenViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token_views', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(firma::class);
            $table->foreignIdFor(Client::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Business::class);
            $table->string('tokenView')->index();
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
        Schema::dropIfExists('token_views');
    }
}
