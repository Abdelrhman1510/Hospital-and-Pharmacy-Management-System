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
            Schema::create('medicine_sections', function (Blueprint $table) {
                $table->id();
            $table->string('name'); // Name of the section
            $table->text('description')->nullable(); // Optional description of the section
            $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('medicine_sections');
        }
    };
