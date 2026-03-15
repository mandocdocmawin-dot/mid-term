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
        Schema::create('coffee_supplies', function (Blueprint $table) {
            $table->uuid();
            $table->string('coffee_id')->unique();
            $table->string('name', 50);
            $table->enum('category', ['Arabica', 'Robusta', 'Liberica']);
            $table->integer('quantity');
            $table->enum('unit_of_measure', ['kg', 'lbs', 'oz']);
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee_supplies');
    }
};
