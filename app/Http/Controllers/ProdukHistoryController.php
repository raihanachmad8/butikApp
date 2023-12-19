<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProdukHistory;

class ProdukHistoryController extends Controller
{
    /**
     * Menampilkan riwayat perubahan produk.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $produk = Produk::findOrFail($id);
        // $historiProduk = ProdukHistory::where('produk_id', $id)->get();
        // $historiProduk = ProdukHistory::all();
        // $historiProduk = ProdukHistory::all();

        return view('histori-produk.index',
            [
                'title' => 'Histori Produk',
                'active' => 'p_history',
            ])->with('historiProduk', Produk::all());


        //return redirect('/histori-produk')->with('success', 'Riwayat perubahan berhasil disimpan.');
    }

    public function store(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        // Simpan riwayat perubahan pada produk
        ProdukHistory::create([
            'produk_id' => $id,
            'field_changed' => $request->input('field_changed'),
            'old_value' => $produk->{$request->input('field_changed')},
            'new_value' => $request->input('new_value'),
        ]);

        // Update nilai kolom pada produk
        $produk->{$request->input('field_changed')} = $request->input('new_value');
        $produk->save();

        return redirect('/histori-produk')->with('success', 'Riwayat perubahan berhasil disimpan.');
    }
}
