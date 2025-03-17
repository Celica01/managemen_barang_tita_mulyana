@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Sales</h1>
        <a href="{{ route('sales.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Tambah Sales
        </a>
    </div>
    @if(session('success'))
        <div class="mt-4 p-2 bg-green-500 text-white rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Tanggal</th>
                <th class="p-2">Customer</th>
                <th class="p-2">DO Number</th>
                <th class="p-2">Status</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr class="border">
                    <td class="p-2">{{ $sale->tgl_sales }}</td>
                    <td class="p-2">{{ $sale->customer->nama_customer }}</td>
                    <td class="p-2">{{ $sale->do_number }}</td>
                    <td class="p-2">{{ $sale->status }}</td>
                    <td class="p-2">
                        <a href="{{ route('sales.edit', $sale->id) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
