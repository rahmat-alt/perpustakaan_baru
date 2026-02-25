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
        Schema::create('heroinfo', function (Blueprint $table) {
            $table->id();
            $table->string('pre_title', 50);
            $table->string('judul', 50);
            $table->string('deskripsi', 255);
            $table->string('phone_number', 20);
            $table->string('email', 100);
            $table->string('address', 255);
            $table->string('website', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroinfo');
    }
};
