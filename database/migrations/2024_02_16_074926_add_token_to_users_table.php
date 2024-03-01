<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dateTime('approve_at')->after('is_approve')->nullable();
            $table->string('token')->nullable()->after('approve_at');
            $table->integer('connection_id')->nullable()->after('token');
            $table->enum('user_status', ['Offline', 'Online'])->after('connection_id');
            $table->string('user_image')->nullable()->after('user_status');
            $table->boolean('is_admin')->default(false)->after('user_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('approve_at');
            $table->dropColumn('token');
            $table->dropColumn('connection_id');
            $table->dropColumn('user_status');
            $table->dropColumn('user_image');
            $table->dropColumn('is_admin');
        });
    }
};
