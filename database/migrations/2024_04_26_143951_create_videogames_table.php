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
            $table->string('distributor', 30);
            $table->string('genre', 30);
            $table->float('iva')->default(21);
            $table->decimal('base_amount', 10, 2);
            $table->decimal('sale_amount', 10, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
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
