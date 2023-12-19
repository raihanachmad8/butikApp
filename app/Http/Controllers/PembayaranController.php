<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pembayaran.index', [
            'title' => 'Pembayaran',
            'active' => 'pembayaran',
            'pembayarans' => Pembayaran::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pembayaran.create', [
            'title' => 'Tambah Pembayaran',
            'active' => 'pembayaran',
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'JenisPembayaran' => 'required|max:255',
        ]);

        Pembayaran::create($validatedData);

        return redirect('/pembayaran')->with('status', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pembayaran::destroy($id);
//         dd($id);

        return redirect('/pembayaran')->with('status','Data berhasil dihapus');
    }
}
