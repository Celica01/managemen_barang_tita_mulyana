@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Customer</h1>
        <a href="{{ route('customers.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Tambah Customer
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
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Telepon</th>
                    <th class="p-3 border w-32 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr class="border hover:bg-gray-100 transition">
                        <td class="p-3 border">{{ $customer->nama_customer }}</td>
                        <td class="p-3 border">{{ $customer->email }}</td>
                        <td class="p-3 border">{{ $customer->telp }}</td>
                        <td class="p-3 border text-center">
                            <a href="{{ route('customers.edit', $customer->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a> |
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus customer ini?')">
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
