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
        $configs = [
            [
                'environment_id' => 2,
                'config_name' => 'site_title',
                'value' => 'Website Env. 2'
            ],
            [
                'environment_id' => 2,
                'config_name' => 'meta_title',
                'value' => 'Website Env. 2'
            ],
            [
                'environment_id' => 2,
                'config_name' => 'favicon',
                'value' => 'img/icons/favicon.ico'
            ],
            [
                'environment_id' => 2,
                'config_name' => 'copyright_name',
                'value' => 'Env. 2 Developer Name'
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
            ->where('environment_id', 2)
            ->delete();
        DB::commit();
    }
};
