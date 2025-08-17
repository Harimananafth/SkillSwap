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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('giverId');
            $table->unsignedBigInteger('receiverId');
            $table->unsignedBigInteger('skillId');
            $table->integer('hours');

            $table->foreign('giverId')->references('id')->on('users');
            $table->foreign('receiverId')->references('id')->on('users');
            $table->foreign('skillId')->references('id')->on('skills');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
