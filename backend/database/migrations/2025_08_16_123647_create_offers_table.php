<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('skillId');
            $table->string('title');
            $table->string('description');
            $table->integer('hoursAvalaible');

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('skillId')->references('id')->on('skills');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
