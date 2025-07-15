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
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ptk_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('pendidikan');
            $table->string('jenis_kelamin');
            $table->string('usia');
            $table->string('pengalaman');                                   
            $table->string('bahasa_asing');
            $table->string('keahlian_khusus');
            $table->boolean('psikotest')->default(false);
            $table->string('email');
            $table->string('telepon');
            $table->string('cv_path'); 
            $table->json('images')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamarans');
    }
};
