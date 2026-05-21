<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien; // Memanggil Model Pasien yang terhubung ke tabel daftar_pasien

class InputPasienController extends Controller
{
    // 1. Menampilkan halaman form & tabel pasien
    public function indexPasien()
    {
        $pasien = Pasien::all(); 

        // Membuat No Pasien otomatis di awal halaman (Misal: BML-0001)
        $totalPasien = Pasien::count() + 1;
        $noPasienOtomatis = '0' . str_pad($totalPasien, 4, '0', STR_PAD_LEFT);

        // Mengarahkan ke file blade inputDaftarPasien di folder bidan
        return view('bidan.inputDaftarPasien', compact('pasien', 'noPasienOtomatis'));
    }

    // 2. Menyimpan data baru ATAU mengupdate data lama saat tombol "+ Tambah" diklik
    public function storePasien(Request $request)
    {
        // Validasi: NIK harus 16 digit dan tidak boleh kembar di database
        $request->validate([
            'nik' => $request->id 
                ? 'required|numeric|digits:16|unique:daftar_pasien,nik,' . $request->id 
                : 'required|numeric|digits:16|unique:daftar_pasien,nik',
            'nama_pasien' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
        ], [
            'nik.unique' => 'NIK ini sudah terdaftar di sistem Bumiloo!',
            'nik.digits' => 'NIK harus berjumlah 16 digit angka.',
        ]);

        // Kunci No Pasien: Kalau sedang EDIT pakai nomor lama, kalau BARU buat nomor urut baru
        if ($request->id) {
            $pasienLama = Pasien::findOrFail($request->id);
            $no_pasien = $pasienLama->no_pasien;
        } else {
            $totalPasien = Pasien::count() + 1;
            $no_pasien = '00-' . str_pad($totalPasien, 4, '0', STR_PAD_LEFT);
        }

        // Simpan data ke tabel database 'daftar_pasien'
        Pasien::updateOrCreate(
            ['id' => $request->id], 
            [
                'no_pasien'      => $no_pasien,
                'nik'            => $request->nik,
                'nama_pasien'    => $request->nama_pasien,
                'tempat_lahir'   => $request->tempat_lahir,
                'tanggal_lahir'  => $request->tanggal_lahir,
                'umur'           => $request->umur,
                'golongan_darah' => $request->golongan_darah,
                'alamat'         => $request->alamat,
                'no_hp'          => $request->no_hp,
                'pendidikan'     => $request->pendidikan,
                'agama'          => $request->agama,
                'pekerjaan'      => $request->pekerjaan,
                'nama_suami'     => $request->nama_suami,
            ]
        );

        // PERBAIKAN: Mengubah 'success' menjadi 'sukses' agar sinkron dengan @if(session('sukses')) di file Blade
        // Dan diarahkan ke route halaman tambah agar data tabel langsung ter-refresh sempurna
        // Pastikan mengarah ke rute inputDaftarPasien
        return redirect()->route('bidan.inputDaftarPasien')->with('sukses', 'Data Ibu Hamil Berhasil Disimpan!');
    }

    // 3. Mengambil data pasien saat baris tabel diklik (untuk JavaScript Fetch)
    public function showPasien($id)
    {
        $pasien = Pasien::findOrFail($id);
        return response()->json($pasien);
    }
}