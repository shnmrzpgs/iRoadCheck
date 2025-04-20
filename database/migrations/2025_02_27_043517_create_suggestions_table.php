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
        Schema::create('suggestions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->references('id')->on('reports');
            $table->foreignId('reporter_id')->references('id')->on('users');
            $table->boolean('is_match');
            $table->timestamp('response_deadline')->nullable();
            $table->string('defect');
            $table->string('location');
            $table->string('street')->default('N/A');
            $table->string('purok')->default('N/A');
            $table->string('barangay')->default('N/A');
            $table->date('date');
            $table->time('time')->nullable();
            $table->foreignId('label')->references('id')->on('severities');
            $table->foreignId('severity')->references('id')->on('severities');
            $table->string('status');
            $table->string('image');
            $table->string('image_annotated')->nullable();
            $table->decimal('lat', 10, 8);
            $table->decimal('lng', 11, 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggestions');
    }
};
