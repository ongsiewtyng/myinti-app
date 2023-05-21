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
            Schema::create('order', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->unsignedBigInteger('food_id')->nullable();
                $table->unsignedBigInteger('order_id')->nullable();
                $table->decimal('total', 8, 2)->nullable();
                $table->unsignedInteger('quantity');
                $table->string('payment_method')->nullable();
                $table->string('order_type')->nullable();
                $table->string('status')->default('pending');
                $table->timestamps();
                
                // Define foreign key constraint for user_id column
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                // Define foreign key constraint for food_id column
                $table->foreign('food_id')->references('id')->on('food')->onDelete('cascade');
                // Define
                $table->foreign('order_id')->references('id')->on('cart')->onDelete('cascade');
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
