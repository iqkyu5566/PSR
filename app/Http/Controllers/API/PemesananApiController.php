<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = Pemesanan::with('user', 'produk')->paginate(10);
        return response()->json([
            'data' => $pemesanan
        ]);
    }

      /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pesan'              => 'required',
            'harga'              => 'required',
            'tanggal_pengerjaan' => 'required',
            'psr_id'             => 'required',
            'produk_id'          => 'required'
        ]);

        $pemesanan                     = new Pemesanan();
        $pemesanan->pesan              = $request->pesan;
        $pemesanan->harga              = $request->harga;
        $pemesanan->tanggal_pengerjaan = $request->tanggal_pengerjaan;
        $pemesanan->status             = 'Menunggu';
        $pemesanan->user_id            = Auth::user()->id;
        $pemesanan->psr_id             = $request->psr_id;
        $pemesanan->produk_id          = $request->produk_id;
        $pemesanan->save();

        return response()->json([
            'data' => $pemesanan
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'data' => Pemesanan::find($id)
        ]);
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
        $request->validate([
            'pesan'              => 'required',
            'harga'              => 'required',
            'tanggal_pengerjaan' => 'required',
            'status'             => 'required',
            'psr_id'             => 'required',
            'produk_id'          => 'required'
        ]);

        $pemesanan                     = Pemesanan::find($id);
        $pemesanan->pesan              = $request->pesan;
        $pemesanan->harga              = $request->harga;
        $pemesanan->tanggal_pengerjaan = $request->tanggal_pengerjaan;
        $pemesanan->status             = 'Menunggu Konfirmasi';
        $pemesanan->user_id            = Auth::user()->id;
        $pemesanan->psr_id             = $request->psr_id;
        $pemesanan->produk_id          = $request->produk_id;
        $pemesanan->save();

        return response()->json([
            'data' => $pemesanan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemesanan = Pemesanan::find($id);
        $pemesanan->delete();

        return response()->json([
            'message' => 'Pemesanan Berhasil Dihapus',
        ], 204);
    }
}