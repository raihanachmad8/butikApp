<!-- resources/views/histori_produk.blade.php -->

@extends('layouts.main')

@section('content')
    <h1>Histori Produk</h1>
    {{ var_dump($historiProduk) }}
    {{ die() }}
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produk ID</th>
                <th>Field Changed</th>
                <th>Old Value</th>
                <th>New Value</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historiProduk as $history)
                <tr>
                    <td>{{ $history->id }}</td>
                    <td>{{ $history->produk_id }}</td>
                    <td>{{ $history->field_changed }}</td>
                    <td>{{ $history->old_value }}</td>
                    <td>{{ $history->new_value }}</td>
                    <td>{{ $history->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
