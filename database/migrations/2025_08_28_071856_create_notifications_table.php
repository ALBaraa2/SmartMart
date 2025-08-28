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
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type'); // order_created, delivery_update, etc.
            $table->morphs('notifiable'); // user, driver, etc.
            $table->text('data'); // JSON data
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

            $table->index('notifiable_id');
            $table->index('notifiable_type');
            $table->index('read_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
