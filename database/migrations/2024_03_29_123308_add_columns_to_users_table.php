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
            $table->date('birthdate')->nullable()->after('email');
            $table->string('phone')->nullable()->after('birthdate');
            $table->string('address')->nullable()->after('phone');
            $table->string('profile_picture')->nullable()->after('address');
            $table->text('background')->nullable()->after('profile_picture');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birthdate');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('profile_picture');
            $table->dropColumn('background');
        });
    }
};
