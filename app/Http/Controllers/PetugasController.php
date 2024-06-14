<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.user.permission');
    }

    public function index()
    {
        $data = Petugas::all();
        return view('petugas.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
            'no_hp' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $namaFile = Str::uuid() . '.' . $request->file('foto')->getClientOriginalExtension();
        $gambarPath = $request->file('foto')->storeAs('uploads', $namaFile, 'public');
        $validasi['foto'] = '/storage/uploads/' . $namaFile;

        $data = Petugas::create($validasi);
        return redirect('/petugas')->with('success', 'Berhasil menambahkan data petugas!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Petugas::findOrFail($id);
        return view('petugas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
            'no_hp' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Anda bisa menghapus 'required' jika foto tidak wajib diubah pada saat update
        ]);

        $petugas = Petugas::findOrFail($id); // Cari data petugas berdasarkan ID yang diberikan

        // Perbarui data petugas dengan data baru
        $petugas->nama = $validasi['nama'];
        $petugas->alamat = $validasi['alamat'];
        $petugas->umur = $validasi['umur'];
        $petugas->no_hp = $validasi['no_hp'];

        // Jika ada foto yang diunggah, proses foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($petugas->foto) {
                Storage::disk('public')->delete($petugas->foto);
            }

            // Buat nama file baru dengan UUID
            $namaFile = Str::uuid() . '.' . $request->file('foto')->getClientOriginalExtension();

            // Simpan foto baru ke penyimpanan
            $gambarPath = $request->file('foto')->storeAs('uploads', $namaFile, 'public');
            $petugas->foto = '/storage/uploads/' . $namaFile;
        }

        // Simpan perubahan data petugas
        $petugas->save();

        return redirect('/petugas')->with('success', 'Berhasil memperbarui data petugas!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data petugas berdasarkan ID yang diberikan
        $petugas = Petugas::findOrFail($id);

        // Hapus foto petugas dari penyimpanan jika ada
        if ($petugas->foto) {
            Storage::disk('public')->delete($petugas->foto);
        }

        // Hapus data petugas dari database
        $petugas->delete();

        return redirect('/petugas')->with('success', 'Berhasil menghapus data petugas!');
    }
}
