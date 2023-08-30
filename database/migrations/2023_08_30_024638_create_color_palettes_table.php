<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('color_palettes', function (Blueprint $table) {
            $table->id();
            $table->string('template_name');
            $table->json('colors'); // You can use 'text' if you prefer
            $table->boolean('is_selected')->default(false); // New column for selection status
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('color_palettes');
    }
};
