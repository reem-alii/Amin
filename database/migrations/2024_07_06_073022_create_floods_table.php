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
        Schema::create('floods', function (Blueprint $table) {
            $table->id();
            $table->float('JAN');
            $table->float('FEB');
            $table->float('MAR');
            $table->float('APR');
            $table->float('MAY');
            $table->float('JUN');
            $table->float('JUL');
            $table->float('AUG');
            $table->float('SEP');
            $table->float('OCT');
            $table->float('NOV');
            $table->float('DECMB');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('floods');
    }
};
