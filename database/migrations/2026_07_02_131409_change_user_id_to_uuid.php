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
        // 1. Add temp column
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('new_uuid')->nullable();
        });

        // 2. Populate temp column
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['new_uuid' => Str::uuid()->toString()]);
        }

        // 3. Clear sessions and change user_id type
        DB::table('sessions')->truncate();
        Schema::table('sessions', function (Blueprint $table) {
            $table->string('user_id', 36)->nullable()->change();
        });

        // 4. Remove auto-increment from old id
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->change();
        });
        
        // 5. Drop old primary key and id column
        Schema::table('users', function (Blueprint $table) {
            $table->dropPrimary();
            $table->dropColumn('id');
        });

        // 6. Rename new_uuid to id
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('new_uuid', 'id');
        });

        // 7. Make it the new primary key
        Schema::table('users', function (Blueprint $table) {
            $table->primary('id');
        });
    }

    public function down(): void
    {
        // Reversing this is destructive, so we leave it empty or throw an exception
    }
};
