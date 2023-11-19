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
        Schema::create('quiz_difficulties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('level')->nullable();
            $table->string('multiplier')->nullable();
            $table->foreignId('quiz_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_difficulties');
    }
};
