<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        $tables = [
            'prokers' => 'nama_proker',
            'kegiatans' => 'nama_kegiatan',
            'artikels' => 'judul'
        ];

        foreach ($tables as $table => $titleColumn) {
            // 1. Add temp column
            Schema::table($table, function (Blueprint $table_bp) {
                $table_bp->uuid('new_uuid')->nullable();
            });

            // 2. Populate new_uuid and update slug
            $records = DB::table($table)->get();
            foreach ($records as $record) {
                $uuid = Str::uuid()->toString();
                $newSlug = Str::slug($record->$titleColumn) . '-' . $uuid;
                
                DB::table($table)
                    ->where('id', $record->id)
                    ->update([
                        'new_uuid' => $uuid,
                        'slug' => $newSlug
                    ]);
            }

            // 3. Remove auto-increment from old id
            Schema::table($table, function (Blueprint $table_bp) {
                $table_bp->unsignedBigInteger('id')->change();
            });
            
            // 4. Drop old primary key and id column
            Schema::table($table, function (Blueprint $table_bp) {
                $table_bp->dropPrimary();
                $table_bp->dropColumn('id');
            });

            // 5. Rename new_uuid to id
            Schema::table($table, function (Blueprint $table_bp) {
                $table_bp->renameColumn('new_uuid', 'id');
            });

            // 6. Make it the new primary key
            Schema::table($table, function (Blueprint $table_bp) {
                $table_bp->primary('id');
            });
        }
    }

    public function down(): void
    {
        // One way migration
    }
};
