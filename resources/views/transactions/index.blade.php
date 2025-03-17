@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Transaksi</h1>
        <a href="{{ route('transactions.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Tambah Transaksi
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
                <th class="p-2">Item</th>
                <th class="p-2">Quantity</th>
                <th class="p-2">Price</th>
                <th class="p-2">Amount</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr class="border">
                    <td class="p-2">{{ $transaction->item->nama_item }}</td>
                    <td class="p-2">{{ $transaction->quantity }}</td>
                    <td class="p-2">Rp{{ number_format($transaction->price, 0, ',', '.') }}</td>
                    <td class="p-2">Rp{{ number_format($transaction->amount, 0, ',', '.') }}</td>
                    <td class="p-2">
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="inline">
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
