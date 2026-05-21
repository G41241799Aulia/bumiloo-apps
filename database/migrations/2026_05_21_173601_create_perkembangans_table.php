<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('perkembangan', function (Blueprint $blueprint) {
        $blueprint->id();
        
        // Relasi ke tabel daftar_pasien
        $blueprint->foreignId('pasien_id')->constrained('daftar_pasien')->onDelete('cascade');

        // Data Pemeriksaan
        $blueprint->date('tanggal_pemeriksaan');
        $blueprint->time('waktu_pemeriksaan');

        // Data Kehamilan (LENGKAP)
        $blueprint->string('usia_kehamilan'); 
        $blueprint->integer('trimester'); // Kolom baru: Diisi angka 1, 2, atau 3
        $blueprint->integer('kehamilan_ke'); // Kolom baru: Gravida (Hamil ke-berapa)
        $blueprint->date('hpht')->nullable(); 
        $blueprint->date('hpl')->nullable();  

        // Riwayat Kesehatan Ibu (Kolom baru, tipe text agar muat banyak info)
        $blueprint->text('riwayat_penyakit')->nullable();
        $blueprint->text('riwayat_alergi')->nullable();

        // Hasil Fisik & Klinis (LENGKAP)
        $blueprint->decimal('berat_badan', 5, 2); 
        $blueprint->decimal('tinggi_badan', 5, 2);
        $blueprint->decimal('imt', 4, 2)->nullable(); // Kolom baru: Indeks Massa Tubuh (misal: 22.50)
        $blueprint->string('tekanan_darah'); 
        $blueprint->integer('tinggi_fundus')->nullable(); 
        $blueprint->decimal('lila', 4, 2)->nullable(); // Kolom baru: Lingkar Lengan Atas (misal: 23.5 cm)
        $blueprint->integer('djj')->nullable();           

        // Catatan & Rekomendasi Medis
        $blueprint->text('keluhan')->nullable();
        $blueprint->text('tindakan')->nullable();
        $blueprint->text('obat')->nullable();
        $blueprint->text('catatan_tambahan')->nullable();

        $blueprint->timestamps(); 
    });
}

    public function down(): void
    {
        Schema::dropIfExists('perkembangan');
    }
};