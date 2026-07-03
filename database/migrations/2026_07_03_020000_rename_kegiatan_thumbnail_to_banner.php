<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('kegiatans', 'thumbnail') && !Schema::hasColumn('kegiatans', 'banner')) {
            Schema::table('kegiatans', function (Blueprint $table) {
                $table->renameColumn('thumbnail', 'banner');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('kegiatans', 'banner') && !Schema::hasColumn('kegiatans', 'thumbnail')) {
            Schema::table('kegiatans', function (Blueprint $table) {
                $table->renameColumn('banner', 'thumbnail');
            });
        }
    }
};
