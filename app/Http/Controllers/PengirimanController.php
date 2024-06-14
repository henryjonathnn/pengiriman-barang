<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pengirim;
use App\Models\Pengiriman;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengirimanController extends Controller
{
    public function index()
    {
        if (auth()->user()->can('data_pengiriman')) {
            $data = Pengiriman::with('pengirim', 'petugas','kendaraan')->get();
            return view('pengiriman.index', compact('data'));
        }
        return abort(403);
    }




    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $user = User::with('pengirim')->first();
    //     return view('pengiriman.tambah', ['user' => $user]);

    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $user = User::with('pengirim')->first();

    //     if ($user->pengirim) {
    //         $pengirim = $user->pengirim;
    //         $pengirim->alamat = $request->alamat;
    //         $pengirim->no_hp = $request->no_hp;
    //         $pengirim->save();
    //     } else {
    //         $pengirim = Pengirim::create([
    //             'id_user' => $user->id,
    //             'nama' => $user->name,
    //             'alamat' => $request->alamat,
    //             'no_hp' => $request->no_hp,
    //         ]);
    //     }

    //     // Set the status based on your application logic
    //     $status = 'proses'; // Default status

    //     // Example: If the shipment is successfully received on the same day it was sent, change status to 'diterima'
    //     if ($request->tanggal_dikirim === now()->toDateString()) {
    //         $status = 'dikirim';
    //     }

    //     $pengiriman = Pengiriman::create([
    //         'id_pengirim' => $pengirim->id,
    //         'nama_penerima' => $request->nama_penerima,
    //         'alamat_penerima' => $request->alamat_penerima,
    //         'nohp_penerima' => $request->nohp_penerima,
    //         'tanggal_dikirim' => $request->tanggal_dikirim,
    //         'nama_barang' => $request->nama_barang,
    //         'berat_barang' => $request->berat_barang,
    //         'jumlah' => $request->jumlah,
    //         'status' => $status,
    //         // ...
    //     ]);

    //     // Redirect with success message
    //     return redirect('/pengiriman')->with('success', 'Data berhasil disimpan.');
    // }



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
        $pengiriman = Pengiriman::with('kendaraan')->findOrFail($id);
        $petugas = Petugas::all();
        $kendaraan = Kendaraan::all();
        return view('pengiriman.edit', compact('pengiriman', 'petugas','kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'nama_pengirim' => 'required',
            'nama_penerima' => 'required',
            'tanggal_dikirim' => 'required|date',
            'harga' => 'required',
            'status' => 'required',
            'id_petugas' => 'required|exists:petugas,id',
            'id_kendaraan' => 'required',
        ]);

        $pengiriman = Pengiriman::findOrFail($id);
        $pengiriman->update([
            'nama_penerima' => $validatedData['nama_penerima'],
            'tanggal_dikirim' => $validatedData['tanggal_dikirim'],
            'harga' => $validatedData['harga'],
            'status' => $validatedData['status'],
            'id_petugas' => $validatedData['id_petugas'],
            'id_kendaraan' => $validatedData['id_kendaraan'],
        ]);

        $pengiriman->pengirim->update([
            'nama' => $validatedData['nama_pengirim'],
        ]);

        $pengiriman->kendaraan->update([
            'id' => $validatedData['id_kendaraan'],
        ]);


        return redirect()->route('pengiriman.index')->with('success', 'Data pengiriman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateFotoPenyerahan(Request $request, $id)
    {
        $validatedData = $request->validate([
            'foto_penyerahan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pengiriman = Pengiriman::findOrFail($id);

        if ($request->hasFile('foto_penyerahan')) {
            // Hapus foto lama jika ada
            if ($pengiriman->foto_penyerahan) {
                Storage::delete($pengiriman->foto_penyerahan);
            }

            // Simpan foto baru
            $foto = $request->file('foto_penyerahan');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('uploads', $fotoName, 'public');
            $pengiriman->foto_penyerahan = '/storage/uploads/' . $fotoName;
        }

        $pengiriman->status = 'terkirim';
        $pengiriman->save();

        return redirect()->route('pengiriman.index')->with('success', 'Foto penyerahan berhasil ditambahkan dan status diperbarui menjadi dikirim.');
    }
}
