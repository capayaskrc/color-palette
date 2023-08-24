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
        Schema::create('paint_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('plate_number');
            $table->enum('current_color', ['red', 'blue', 'green']);
            $table->enum('target_color', ['red', 'blue', 'green']);
            $table->enum('status', ['queued', 'processing', 'completed'])->default('queued');
            $table->integer('order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paint_jobs');
    }
};
