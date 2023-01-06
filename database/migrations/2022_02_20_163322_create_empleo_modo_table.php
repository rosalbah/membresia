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
        Schema::create('empleo_modo', function (Blueprint $table) {
            $table->id();

            $table->foreignId('empleo_id')->references('id')->on('empleos')->onDelete('cascade');
            $table->foreignId('modo_id')->references('id')->on('modos')->onDelete('cascade');

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
        Schema::dropIfExists('empleo_modo');
    }
};
