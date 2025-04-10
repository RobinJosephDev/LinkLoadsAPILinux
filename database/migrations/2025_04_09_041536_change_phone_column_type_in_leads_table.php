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
        // Change phone from bigInteger to string
        Schema::table('leads', function (Blueprint $table) {
            $table->string('phone')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert phone back to bigInteger
        Schema::table('leads', function (Blueprint $table) {
            $table->bigInteger('phone')->nullable()->change();
        });
    }
};
