<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $environments = [
            [
                'id' => 1,
                'name' => 'default',
                'domain' => 'domain1.example.com',
            ],
            [
                'id' => 2,
                'name' => 'second',
                'domain' => 'domain2.example.com',
            ],
        ];

        DB::beginTransaction();
        DB::table('environments')
            ->insert($environments);
        DB::commit();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::beginTransaction();
        DB::table('environments')
            ->delete([1, 2]);
        DB::commit();
    }
};
