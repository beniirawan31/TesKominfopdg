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
       Schema::create('tb_siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nisn')->unique(); // biasanya unik
            $table->string('alamat');
            $table->string('id_sekolah');
            $table->string('id_kelas')->nullable(); // ditambah biar sesuai view
            $table->string('id_th_ajar');
            $table->string('id_mesjid');
            $table->string('id_card')->unique();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_siswas');
    }
};
