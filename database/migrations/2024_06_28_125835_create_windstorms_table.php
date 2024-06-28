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
        Schema::create('windstorms', function (Blueprint $table) {
            $table->id();
            $table->float('temperature');
            $table->float('relative_humidity');
            $table->float('pressure');
            $table->float('wind_direction');
            $table->float('precipitation');
            $table->float('windgustspeed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('windstorms');
    }
};
