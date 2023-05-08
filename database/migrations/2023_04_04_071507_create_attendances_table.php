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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignUuid('student_uuid')->references('uuid')->on('students')->cascadeOnDelete();
            $table->foreignUuid('schedule_uuid')->references('uuid')->on('schedules')->cascadeOnDelete();
            $table->boolean('attend')->nullable();
            $table->boolean('sick')->nullable();
            $table->boolean('no_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
