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
        Schema::create('employees', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('department')->nullable();
    $table->string('rfid_tag')->unique()->nullable();
    $table->string('biometric_code')->unique()->nullable();
    $table->string('fingerprint_id')->unique()->nullable();
    $table->string('photo_path')->nullable(); // for selfie or photo
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
