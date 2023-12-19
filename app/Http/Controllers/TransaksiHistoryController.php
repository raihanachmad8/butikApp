<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\TransaksiHistory;

class TransaksiHistoryController extends Controller
{
    /**
     * Display the transaction history.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // $transaksi = Transaksi::findOrFail($id);
        // $historiTransaksi = TransaksiHistory::where('transaksi_id', $id)->get();

        return view('histori-transaksi.index',
        [
            'title' => 'History Transaksi',
            'active' => 't_history'
        ]);

        //return redirect('/histori-transaksi')->with('success', 'Riwayat perubahan berhasil disimpan.');
    }

    public function store(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Save transaction history
        TransaksiHistory::create([
            'transaksi_id' => $id,
            'field_changed' => $request->input('field_changed'),
            'old_value' => $transaksi->{$request->input('field_changed')},
            'new_value' => $request->input('new_value'),
        ]);

        // Update column value in the transaction
        $transaksi->{$request->input('field_changed')} = $request->input('new_value');
        $transaksi->save();

        return redirect('/histori-transaksi')->with('success', 'Riwayat perubahan berhasil disimpan.');
    }
}
