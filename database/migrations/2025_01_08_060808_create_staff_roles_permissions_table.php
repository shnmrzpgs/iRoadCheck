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
        Schema::create('staff_roles_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_role_id')->constrained('staff_roles')->onDelete('cascade');
            $table->foreignId('staff_permission_id')->constrained('staff_permissions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_roles_permissions');
    }
};
