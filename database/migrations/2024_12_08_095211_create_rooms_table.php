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
        Schema::create('rooms', function (Blueprint $table) {
                  $table->id();
                  $table->string('room_number')->unique();
                  $table->string('type');
                  $table->integer('capacity');
                  $table->string('status')->default('Available'); // Available, Occupied, Maintenance
                  $table->text('notes')->nullable();
                  $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
