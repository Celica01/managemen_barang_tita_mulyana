@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Edit Transaksi</h1>
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-bold">Item</label>
            <select name="id_item" id="id_item" class="w-full p-2 border rounded" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" data-price="{{ $item->harga_jual }}"
                        {{ $transaction->id_item == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_item }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="w-full p-2 border rounded"
                value="{{ $transaction->quantity }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Total Amount</label>
            <input type="text" id="amount" class="w-full p-2 border rounded bg-gray-100" readonly>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const idItem = document.getElementById("id_item");
        const quantity = document.getElementById("quantity");
        const amount = document.getElementById("amount");

        function updateAmount() {
            const selectedItem = idItem.options[idItem.selectedIndex];
            const price = parseFloat(selectedItem.getAttribute("data-price")) || 0;
            const qty = parseInt(quantity.value) || 0;
            amount.value = price * qty;
        }

        idItem.addEventListener("change", updateAmount);
        quantity.addEventListener("input", updateAmount);

        updateAmount(); // Hitung saat halaman dimuat
    });
</script>
@endsection
