<?php

namespace App\Http\Controllers;

use App\Models\PsrRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsrRatingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $psr_rating = PsrRating::with('user', 'pemesanan')->paginate(10);
        return response()->json([
            'data' => $psr_rating
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
            'rating'       => 'required',
            'comment'      => 'required',
            'pemesanan_id' => 'required',
            'psr_id'       => 'required',
        ]);

        $psr_rating               = new PsrRating();
        $psr_rating->rating       = $request->rating;
        $psr_rating->comment      = $request->comment;
        $psr_rating->pemesanan_id = $request->pemesanan_id;
        $psr_rating->psr_id       = $request->psr_id;
        $psr_rating->save();

        return response()->json([
            'data' => $psr_rating
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'data' => PsrRating::find($id)
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
