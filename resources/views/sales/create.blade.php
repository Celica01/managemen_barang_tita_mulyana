@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Tambah Sales</h1>
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-bold">Tanggal Sales</label>
            <input type="date" name="tgl_sales" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Customer</label>
            <select name="id_customer" class="w-full p-2 border rounded" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->nama_customer }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-bold">DO Number</label>
            <input type="text" name="do_number" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Status</label>
            <input type="text" name="status" class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
