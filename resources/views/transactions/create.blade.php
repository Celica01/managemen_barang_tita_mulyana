@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Tambah Transaksi</h1>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-bold">Item</label>
            <select name="id_item" class="w-full p-2 border rounded" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" data-price="{{ $item->harga_jual }}">{{ $item->nama_item }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
