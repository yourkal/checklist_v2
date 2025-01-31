<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('checklists', function (Blueprint $table) {
            $table->integer('tahun')->nullable();
            $table->integer('bulan')->nullable();
            $table->string('area')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('checklists', function (Blueprint $table) {
            $table->dropColumn('tahun');
            $table->dropColumn('bulan');
            $table->dropColumn('area');
        });
    }
    
};
