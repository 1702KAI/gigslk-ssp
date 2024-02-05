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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('employer_id')->constrained()->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('skills')->nullable();
            $table->string('type')->nullable();
            $table->string('budget')->nullable();
            $table->integer('total_bids')->default(0);
            $table->string('duration')->nullable();
            $table->string('status')->default('active');
            $table->boolean('show')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
