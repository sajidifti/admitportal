<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admit_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name_bn');  // Name in Bangla
            $table->string('father_name_bn');  // Father name in Bangla
            $table->string('mother_name_bn');  // Mother name in Bangla
            $table->string('roll')->unique();  // Roll number
            $table->string('school');  // School Name
            $table->string('exam_center_bn');  // Exam center in Bangla
            $table->string('exam_time');  // Exam time
            $table->string('exam_date');  // Exam date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admit_cards');
    }
};
