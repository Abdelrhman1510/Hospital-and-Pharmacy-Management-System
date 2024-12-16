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
        Schema::create('medicine_medicine_invoice', function (Blueprint $table) {
            $table->id(); // Optional, Laravel convention
    $table->foreignId('medicine_id')->constrained()->onDelete('cascade');
    $table->foreignId('medicine_invoice_id')->constrained()->onDelete('cascade');
    $table->integer('quantity');
    $table->decimal('total', 10, 2); // Adjust precision based on your needs
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_medicine_invoice');
    }
};
