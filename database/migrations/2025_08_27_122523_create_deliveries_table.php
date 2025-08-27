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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('driver_id')->constrained()->onDelete('cascade');
            $table->foreignId('delivery_slot_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['pending',
                'assigned',
                'accepted',
                'picking_up',
                'in_transit',
                'arrived',
                'delivered',
                'cancelled',
                'failed'])->default('pending');
            $table->timestamps();
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('picking_up_at')->nullable();
            $table->timestamp('in_transit_at')->nullable();
            $table->timestamp('arrived_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->text('delivery_notes')->nullable();
            $table->text('failure_reason')->nullable();
            $table->string('recipient_name')->nullable();
            $table->string('recipient_phone')->nullable();

            $table->index('order_id');
            $table->index('driver_id');
            $table->index('status');
            $table->index('delivered_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
