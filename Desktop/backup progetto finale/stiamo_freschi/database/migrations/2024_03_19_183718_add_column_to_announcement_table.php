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
        Schema::table('announcements', function (Blueprint $table) {
            $table->string('title')->required();
            $table->decimal('price', 6, 2)->required();
            $table->string('description')->required();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcement', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('price');
            $table->dropColumn('description');
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
