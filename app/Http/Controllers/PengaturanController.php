<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;

class PengaturanController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        // Jika yang login adalah Bidan/Admin
        if ($user->role !== 'bumil') {
            $request->validate([
                'name'  => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
        }

        // Jika yang login adalah Pasien / Bumil
        $request->validate([
            'nama'   => 'required|string|max:255',
            'no_hp'  => 'required|string|max:15',
            'email'  => 'required|email|unique:users,email,' . $user->id,
        ]);

        // 1. Update data akun login di tabel users
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->save();

        // 2. Update data profil medis di tb_pendaftaran
        $pendaftaran = Pendaftaran::where('user_id', $user->id)->first();
        if ($pendaftaran) {
            $pendaftaran->update([
                'nama'  => $request->nama,
                'no_hp' => $request->no_hp,
            ]);
        }

        return redirect()->back()->with('success', 'Data diri pendaftaran berhasil diperbarui!');
    }

    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();
        
        // Hapus data pendaftaran dan user secara bersih
        Pendaftaran::where('user_id', $user->id)->delete();
        $user->delete(); 

        return redirect('/')->with('success', 'Akun berhasil dihapus.');
    }
}