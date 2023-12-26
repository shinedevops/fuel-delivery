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
        Schema::create('user_notifications', function (Blueprint $table) {
        $table->id();
            
        $table->foreignId('user_id')->nullable()->references('id')->on('users');
        $table->boolean('accept_order')->nullable();
        $table->boolean('subscription')->nullable();
        $table->boolean('new_order')->nullable();
        $table->boolean('issue')->nullable();
        $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_notifications');
        
    }
};
