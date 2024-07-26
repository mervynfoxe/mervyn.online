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
        Schema::table('config', function(Blueprint $table)
        {
            $table->dropUnique('config_config_name_unique');
            $table->unique(['environment_id', 'config_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('config', function(Blueprint $table)
        {
            // Have to drop foreign key before we can remove the unique key... for some reason
            $table->dropForeign('config_environment_id_foreign');

            // Swap back to single-column unique key
            $table->dropUnique('config_environment_id_config_name_unique');
            $table->unique('config_name');

            // Re-add foreign key
            $table
                ->foreign('environment_id')
                ->references('id')
                ->on('environments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }
};
