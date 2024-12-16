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
        Schema::create('check_ins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID from specific table (e.g., doctor, patient)
            $table->string('user_type'); // Type of user (doctor, patient, etc.)
            $table->timestamp('check_in_at')->nullable(); // Check-in timestamp
            $table->timestamp('check_out_at')->nullable(); // Check-out timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_ins');
    }
};
