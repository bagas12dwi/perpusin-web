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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('library_id');
            $table->string('title');
            $table->text('description');
            $table->string('imgLocation');
            $table->string('author');
            $table->string('publisher');
            $table->boolean('isOnline');
            $table->string('pdfLocation')->nullable();
            $table->integer('stock');
            $table->integer('amercement_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
