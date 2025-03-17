@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Item</h1>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label>Nama Item</label>
            <input type="text" name="nama_item" required class="w-full p-2 border rounded">
        </div>
        <div class="mb-4">
            <label>UOM</label>
            <input type="text" name="uom" required class="w-full p-2 border rounded">
        </div>
        <div class="mb-4">
            <label>Harga Beli</label>
            <input type="number" name="harga_beli" required class="w-full p-2 border rounded">
        </div>
        <div class="mb-4">
            <label>Harga Jual</label>
            <input type="number" name="harga_jual" required class="w-full p-2 border rounded">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection
