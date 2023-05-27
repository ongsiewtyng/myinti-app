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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->string('payment')->nullable();
            $table->string('order_type')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
            
            // Define foreign key constraint for food_id column
            $table->foreign('food_id')->references('id')->on('food')->onDelete('cascade');
            // Define foreign key constraint for order_id column
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
