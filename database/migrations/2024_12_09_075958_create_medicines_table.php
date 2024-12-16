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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_section_id'); // Foreign key to MedicineSection
            $table->string('name'); // Name of the medicine
            $table->string('brand')->nullable(); // Optional brand name
            $table->decimal('price', 8, 2); // Price of the medicine
            $table->integer('stock'); // Stock quantity
            $table->text('description')->nullable(); // Optional description
            $table->timestamps();
            $table->foreign('medicine_section_id')->references('id')->on('medicine_sections')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
