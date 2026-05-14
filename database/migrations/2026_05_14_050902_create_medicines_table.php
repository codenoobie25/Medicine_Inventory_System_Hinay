<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_name');
            $table->string('generic_name');
            $table->enum('category', ['Analgesics', 'Antibiotics', 'Cardiovascular Drugs', 'Antidepressants', 'Gastrointestinal Agents']);
            $table->integer('quantity');
            $table->date('expiration_date');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['available', 'out of stock']);
            $table->timestamps();
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
