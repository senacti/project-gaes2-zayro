<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackupTables extends Migration
{
    public function up()
    {
        Schema::create('backup_tables', function (Blueprint $table) {
            $table->increments('id');
            // Define your backup table columns here
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('backup_tables');
    }
}
