<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pengajuan', function($table) {
            $table->unsignedBigInteger('jenis_surat_id');
            $table->foreign('jenis_surat_id')->references('id')->on('data');
            $table->json('isi_surat')->nullable();
            $table->string('berkas_selesai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
