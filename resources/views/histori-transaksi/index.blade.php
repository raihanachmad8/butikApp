<!-- resources/views/histori_transaksi.blade.php -->

@extends('layouts.main')

@section('content')
    <h1>Histori Transaksi</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Transaksi ID</th>
                <th>Field Changed</th>
                <th>Old Value</th>
                <th>New Value</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($historiTransaksi as $history)
                <tr>
                    <td>{{ $history->id }}</td>
                    <td>{{ $history->transaksi_id }}</td>
                    <td>{{ $history->field_changed }}</td>
                    <td>{{ $history->old_value }}</td>
                    <td>{{ $history->new_value }}</td>
                    <td>{{ $history->created_at }}</td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
@endsection
