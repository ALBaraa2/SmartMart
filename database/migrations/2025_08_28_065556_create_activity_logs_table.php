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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();

            // User relationship (nullable for system activities)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            // Supermarket relationship for multi-store tracking
            $table->foreignId('supermarket_id')->nullable()->constrained()->onDelete('cascade');

            // Action details
            $table->string('action'); // created, updated, deleted, viewed, logged_in, etc.
            $table->string('model_type')->nullable(); // App\Models\Product, App\Models\Order, etc.
            $table->unsignedBigInteger('model_id')->nullable(); // ID of the affected model

            // Change tracking
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();
            $table->text('description');

            // Context information
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('url')->nullable();
            $table->string('method')->nullable(); // GET, POST, PUT, DELETE

            // Additional metadata
            $table->json('properties')->nullable();
            $table->string('batch_uuid')->nullable(); // For grouping related activities

            $table->timestamps();

            // Indexes for performance
            $table->index('user_id');
            $table->index('supermarket_id');
            $table->index('action');
            $table->index('model_type');
            $table->index(['model_type', 'model_id']);
            $table->index('created_at');
            $table->index('batch_uuid');
            $table->index(['user_id', 'created_at']);
            $table->index(['supermarket_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
