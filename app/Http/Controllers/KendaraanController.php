<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kendaraan::all();
        return view('kendaraan.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kendaraan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'merk' => 'required|string|max:255',
            'no_plat' => 'required|string|max:20',
            'warna' => 'required|string|max:50',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $namaFile = Str::uuid() . '.' . $request->file('foto')->getClientOriginalExtension();
        $gambarPath = $request->file('foto')->storeAs('uploads', $namaFile, 'public');
        $validatedData['foto'] = '/storage/uploads/' . $namaFile;

        $data = Kendaraan::create($validatedData);
        return redirect('/kendaraan')->with('success', 'Berhasil menambahkan data kendaraan!');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kendaraan::findOrFail($id);
        return view('kendaraan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'merk' => 'required',
            'no_plat' => 'required',
            'warna' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Anda bisa menghapus 'required' jika foto tidak wajib diubah pada saat update
        ]);

        $kendaraan = Kendaraan::findOrFail($id); // Cari data petugas berdasarkan ID yang diberikan

        // Perbarui data petugas dengan data baru
        $kendaraan->merk = $validasi['merk'];
        $kendaraan->no_plat = $validasi['no_plat'];
        $kendaraan->warna = $validasi['warna'];

        // Jika ada foto yang diunggah, proses foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($kendaraan->foto) {
                Storage::disk('public')->delete($kendaraan->foto);
            }

            // Buat nama file baru dengan UUID
            $namaFile = Str::uuid() . '.' . $request->file('foto')->getClientOriginalExtension();

            // Simpan foto baru ke penyimpanan
            $gambarPath = $request->file('foto')->storeAs('uploads', $namaFile, 'public');
            $kendaraan->foto = '/storage/uploads/' . $namaFile;
        }

        // Simpan perubahan data petugas
        $kendaraan->save();

        return redirect('/kendaraan')->with('success', 'Berhasil memperbarui data kendaraan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
