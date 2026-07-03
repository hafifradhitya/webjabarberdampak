<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('kegiatans', 'overview')) {
            Schema::table('kegiatans', function (Blueprint $table) {
                $table->dropColumn('overview');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumn('kegiatans', 'overview')) {
            Schema::table('kegiatans', function (Blueprint $table) {
                $table->text('overview')->nullable()->after('deskripsi');
            });
        }
    }
};
