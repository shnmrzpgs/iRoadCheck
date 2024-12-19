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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('status')->default('ENABLED');
            $table->boolean('view_dashboard')->default(false);
            $table->boolean('edit_settings')->default(false);
            $table->boolean('access_restricted_data')->default(false);
            $table->boolean('approve_request')->default(false);
            $table->boolean('assign_role')->default(false);
            $table->boolean('manage_permission')->default(false);
            $table->boolean('export_data')->default(false);
            $table->boolean('reset_password')->default(false);
            $table->boolean('manage_category')->default(false);
            $table->boolean('add_new_entry')->default(false);
            $table->boolean('manage_user')->default(false);
            $table->boolean('generate_report')->default(false);
            $table->boolean('manage_inventory')->default(false);
            $table->boolean('view_log')->default(false);
            $table->boolean('update_profile')->default(false);
            $table->boolean('delete_record')->default(false);
            $table->boolean('view_notification')->default(false);
            $table->boolean('monitor_activity')->default(false);
            $table->boolean('view_report')->default(false);
            $table->boolean('archive_data')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
