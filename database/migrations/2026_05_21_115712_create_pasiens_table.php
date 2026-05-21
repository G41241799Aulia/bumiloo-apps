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
        Schema::create('daftar_pasien', function (Blueprint $table) {
            $table->id(); // ID Primary Key (Auto Increment)
            $table->string('no_pasien', 20)->unique();
            $table->string('nik', 16)->unique();
            $table->string('nama_pasien', 100);
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir');
            $table->integer('umur')->nullable();
            $table->char('golongan_darah', 2)->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->string('pendidikan', 30)->nullable();
            $table->string('agama', 20)->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->string('nama_suami', 100)->nullable();
            $table->timestamps(); // Otomatis membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_pasien');
    }
};