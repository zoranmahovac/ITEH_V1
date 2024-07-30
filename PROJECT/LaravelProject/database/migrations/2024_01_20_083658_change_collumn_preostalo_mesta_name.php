<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aranzman', function (Blueprint $table) {
            $table->renameColumn('preostalo_mesta','br_mesta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aranzman', function (Blueprint $table) {
            $table->renameColumn('br_mesta', 'preostalo_mesta');
        });
    }
};
