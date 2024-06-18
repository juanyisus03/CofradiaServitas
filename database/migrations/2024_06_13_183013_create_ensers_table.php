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
        Schema::create('ensers', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->string('estado', 100);
            $table->integer('cantidad');
            $table->foreignId('paso_id')->constrained()->onDelete('Cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ensers');
    }
};
