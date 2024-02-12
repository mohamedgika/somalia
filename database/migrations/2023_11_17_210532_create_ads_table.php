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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price',8,2);
            $table->text('description')->nullable();
            $table->text('feature')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('city')->nullable();
            $table->string('lang')->nullable();
            $table->string('late')->nullable();
            $table->integer('view')->nullable();
            $table->boolean('is_active')->default(false);
            $table->foreignId('subcategory_id')->constrained('subcategories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('shop_id')->nullable()->constrained('shops')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
