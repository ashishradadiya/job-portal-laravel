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
        Schema::table('users', function (Blueprint $table) {
            // Add 'last_name' column
            $table->string('last_name')->nullable()->after('name');

            // Add 'role_id' column (Foreign Key referencing Roles)
            $table->unsignedBigInteger('role_id')->nullable()->after('last_name');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            
            $table->string('phone')->nullable()->after('email');

            // Add 'status' column
            $table->boolean('status')->default(true)->after('remember_token');

            // Rename the 'name' column to 'first_name'
            $table->renameColumn('name', 'first_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert the changes made in the 'up' method
            $table->dropColumn('last_name');
            $table->dropColumn('phone');
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            $table->dropColumn('status');
            $table->renameColumn('first_name', 'name');
        });
    }
};
