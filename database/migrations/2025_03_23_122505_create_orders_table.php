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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('order_types');
            $table->foreignId('partnership_id')->constrained('partnership');
            $table->foreignId('user_id')->constrained('users');
            $table->text('description');
            $table->date('date');
            $table->string('address');
            $table->integer('amount');
            $table->string('status')->default('created');
            $table->timestamps();

            $table->index(['type_id', 'partnership_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
