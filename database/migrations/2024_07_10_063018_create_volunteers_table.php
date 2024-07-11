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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_email');
            $table->foreign('user_email')->unique()->references('email')->on('users')->onDelete('cascade');
            $table->integer('phone_number');
            $table->string('volunteering_type');
            $table->text('skills')->nullable();
            $table->string('availability');
            $table->boolean('verifying_token');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};