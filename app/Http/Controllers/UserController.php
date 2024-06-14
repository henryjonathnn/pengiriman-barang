<?php

namespace App\Http\Controllers;

use App\Models\Pengirim;
use App\Models\Pengiriman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $data = Pengiriman::whereHas('pengirim', function ($query) use ($userId) {
            $query->where('id_user', $userId);
        })->get();

        return view('user.pengiriman.index', compact('data'));
    }


    public function home()
    {
        return view('user.home');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $user = User::findOrFail($id);
        return view('user.pengiriman.tambah', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'nama_penerima' => 'required',
            'alamat_penerima' => 'required',
            'nohp_penerima' => 'required',
            'tanggal_dikirim' => 'required|date',
            'nama_barang' => 'required',
            'jumlah' => 'required',
        ]);

        // Ambil id_user dari user yang sedang login
        $userId = Auth::id();

        // Simpan data pengirim
        $pengirim = Pengirim::create([
            'id_user' => $userId,
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'no_hp' => $validatedData['no_hp'],
        ]);

        // Simpan data pengiriman
        $pengiriman = $pengirim->pengiriman()->create([
            'nama_penerima' => $validatedData['nama_penerima'],
            'alamat_penerima' => $validatedData['alamat_penerima'],
            'nohp_penerima' => $validatedData['nohp_penerima'],
            'tanggal_dikirim' => $validatedData['tanggal_dikirim'],
            'nama_barang' => $validatedData['nama_barang'],
            'jumlah' => $validatedData['jumlah'],
            'status' => 'Proses', // Atau status lain yang sesuai
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Data pengiriman berhasil ditambahkan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan pengiriman berdasarkan ID
        $pengiriman = Pengiriman::findOrFail($id);

        // Hapus pengiriman
        $pengiriman->delete();

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Data pengiriman berhasil dihapus.');
    }

}
