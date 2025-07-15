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
        Schema::create('ptks', function (Blueprint $table) {
            $table->id();
            $table->string('unit');
            $table->string('jabatan');
            $table->date('tanggal_permintaan');
            $table->string('Jumlah_tenaga_kerja');
            $table->string('jumlah_permintaan');
            $table->string('departemen');
            $table->enum('status_karyawan', ['bulanan', 'harian', 'kontrak']);
            $table->string('pendidikan');
            $table->string('jenis_kelamin');
            $table->string('usia');
            $table->string('pengalaman');                                   
            $table->string('bahasa_asing');
            $table->string('keahlian_khusus');
            $table->string('Tes_buta_warna');
            $table->text('uraian_singkat');
            $table->string('struktur_organisasi')->nullable();
            $table->enum('permintaan', ['penggantian', 'penambahan'])->default('penggantian');
            $table->string('alasan')->nullable();
            $table->string('image')->nullable();
            $table->enum('status_manager', ['pending', 'approved', 'rejected'])->default('pending');
            $table->enum('status_director', ['pending', 'approved', 'rejected'])->default('pending');
            $table->enum('status_hr', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('reject_reason_manager')->nullable();
            $table->text('reject_reason_director')->nullable();
            $table->text('reject_reason_hr')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ptks');
    }
};
