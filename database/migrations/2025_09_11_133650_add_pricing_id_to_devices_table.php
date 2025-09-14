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
        Schema::table('devices', function (Blueprint $table) {
            //
            $table->foreignId('pricing_id')
                  ->nullable()
                  ->after('user_id')
                  ->constrained('pricings')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('devices', function (Blueprint $table) {
            //
            $table->dropForeign(['pricing_id']);
            $table->dropColumn('pricing_id');
        });
    }
};
