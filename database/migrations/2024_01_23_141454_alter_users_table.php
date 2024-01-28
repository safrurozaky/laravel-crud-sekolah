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
            $table->renameColumn('name','nama');
            $table->string('role')->after('name');
            $table->integer('nip')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //dipakai ketika kita mau pakai rollback table
            $table->dropColumn('role');
            $table->dropColumn('nip');
            $table->renameColumn('nama','name');
        });
    }
};
