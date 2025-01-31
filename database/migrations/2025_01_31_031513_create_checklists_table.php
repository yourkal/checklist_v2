<?php

// Migration for checklists table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('checklists', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('deskripsi_pekerjaan');
            $table->time('jam_inspeksi');
            $table->string('nama_pic');
            $table->json('status_pekerjaan');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('checklists');
    }
};
