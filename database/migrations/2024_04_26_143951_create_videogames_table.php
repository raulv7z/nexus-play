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
        Schema::create('videogames', function (Blueprint $table) {
            $table->id();
            
            $table->string('name', 60);
            $table->string('description', 120);
            $table->string('front_page', 60)->default('default-fpage.png');
            $table->string('developer', 30);
            $table->string('genre', 30);
            $table->float('base_price');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videogames');
    }
};
