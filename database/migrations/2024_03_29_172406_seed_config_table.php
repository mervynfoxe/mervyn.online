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
        $configs = [
            [
                'environment_id' => 1,
                'config_name' => 'site_title',
                'value' => 'Default Website'
            ],
            [
                'environment_id' => 1,
                'config_name' => 'meta_title',
                'value' => 'Default Website'
            ],
            [
                'environment_id' => 1,
                'config_name' => 'favicon',
                'value' => 'img/icons/favicon.ico'
            ],
            [
                'environment_id' => 1,
                'config_name' => 'copyright_name',
                'value' => 'Developer Name'
            ]
        ];

        DB::beginTransaction();
        DB::table('config')
            ->insert($configs);
        DB::commit();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::beginTransaction();
        DB::table('config')
            ->where('environment_id', 1)
            ->whereIn('config_name', ['site_title', 'meta_title', 'favicon', 'copyright_name'])
            ->delete();
        DB::commit();
    }
};
