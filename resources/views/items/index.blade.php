@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Item</h1>
        <a href="{{ route('items.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Tambah Item
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-500 text-white rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 text-left">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="p-3 border">Nama Item</th>
                    <th class="p-3 border">UOM</th>
                    <th class="p-3 border">Harga Beli</th>
                    <th class="p-3 border">Harga Jual</th>
                    <th class="p-3 border w-32 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr class="border hover:bg-gray-100 transition">
                        <td class="p-3 border">{{ $item->nama_item }}</td>
                        <td class="p-3 border">{{ $item->uom }}</td>
                        <td class="p-3 border">{{ number_format($item->harga_beli) }}</td>
                        <td class="p-3 border">{{ number_format($item->harga_jual) }}</td>
                        <td class="p-3 border text-center">
                            <a href="{{ route('items.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800">Edit</a> |
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
