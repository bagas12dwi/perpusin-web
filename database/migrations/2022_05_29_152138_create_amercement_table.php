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
        Schema::create('amercement', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('amercement_trx_no');
            $table->integer('user_id');
            $table->integer('booking_id');
            $table->integer('nominal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amercement');
    }
};
