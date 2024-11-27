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
        Schema::create('job_posting_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_board_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->enum('type', ['text', 'textarea', 'number', 'date', 'boolean', 'enum']);
            $table->text('options')->nullable();
            $table->boolean('is_required')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posting_attributes');
    }
};
