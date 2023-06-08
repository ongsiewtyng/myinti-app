<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('f_id')->nullable();;
            $table->unsignedBigInteger('session_id')->nullable();;
            $table->unsignedBigInteger('user_id')->nullable();;
            $table->string('room')->nullable();
            $table->string('time')->nullable();
            $table->string('name')->nullable();
            $table->string('studentid')->nullable();
            $table->string('payment')->nullable();
            // Add any additional columns you need for bookings

            $table->timestamps();

            $table->foreign('f_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
