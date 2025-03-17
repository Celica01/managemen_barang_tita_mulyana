@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Tambah Customer</h1>
    
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <label class="block">Nama Customer</label>
        <input type="text" name="nama_customer" class="w-full border p-2" required>

        <label class="block mt-2">Email</label>
        <input type="email" name="email" class="w-full border p-2" required>

        <label class="block mt-2">Telepon</label>
        <input type="text" name="telp" class="w-full border p-2">

        <label class="block mt-2">Alamat</label>
        <textarea name="alamat" class="w-full border p-2"></textarea>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Simpan</button>
    </form>
</div>
@endsection
