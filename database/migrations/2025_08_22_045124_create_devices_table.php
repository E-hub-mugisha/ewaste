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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('device_name');
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->enum('condition', ['New', 'Good', 'Fair', 'Poor']);
            $table->integer('quantity')->default(1);
            $table->string('photo')->nullable();
            $table->text('pickup_address');
            $table->string('tracking_code')->unique();
            $table->enum('status', ['Submitted', 'Collected', 'Transferred', 'Recycled'])->default('Submitted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
