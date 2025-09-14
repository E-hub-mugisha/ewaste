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
        Schema::create('device_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->constrained('devices')->cascadeOnDelete();
            $table->foreignId('collector_id')->constrained('users')->cascadeOnDelete(); // Assigned collector
            $table->foreignId('partner_id')->constrained('partners')->cascadeOnDelete();
            $table->enum('status', ['In transit', 'Received', 'Recycled'])->default('In transit');
            $table->timestamp('transferred_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_transfers');
    }
};
