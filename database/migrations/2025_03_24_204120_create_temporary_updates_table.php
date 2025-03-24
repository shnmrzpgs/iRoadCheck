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
        Schema::create('temporary_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporter_id')->references('id')->on('users');
            $table->time('time')->nullable();
            $table->date('date');
            $table->string('image');
            $table->decimal('lat', 10, 8);
            $table->decimal('lng', 11, 8);
            $table->boolean('is_opened')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporary_updates');
    }
};
