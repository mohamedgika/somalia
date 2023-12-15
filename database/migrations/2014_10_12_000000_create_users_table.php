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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('country');
            $table->string('state');
            $table->string('city')->nullable();
            $table->string('password');
            $table->string('code')->nullable();
            $table->boolean('phone_verified')->default(0);
            // $table->enum('status_ads',['owner','visit'])->default('visit');
            // $table->enum('status_store',['owner','visit'])->default('visit');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
