<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProdukApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::paginate(10);
        return response()->json([
            'data' => $produk
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
            'nama_produk'       => 'required',
            'keterangan_produk' => 'required',
        ]);

        $produk                    = new Produk();
        $produk->nama_produk       = $request->nama_produk;
        $produk->keterangan_produk = $request->keterangan_produk;
        $produk->save();

        return response()->json([
            'data' => $produk
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'data' => produk::find($id)
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
            'nama_produk'       => 'required',
            'keterangan_produk' => 'required',
        ]);


        $produk                    = Produk::find($id);
        $produk->nama_produk       = $request->nama_produk;
        $produk->keterangan_produk = $request->keterangan_produk;
        $produk->save();

        return response()->json([
            'data' => $produk
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return response()->json([
            'message' => 'Produk Berhasil Dihapus',
        ], 204);
    }
}
