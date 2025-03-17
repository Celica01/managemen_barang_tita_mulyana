<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Tampilkan daftar transaksi.
     */
    public function index()
    {
        $transactions = Transaction::with('item')->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Tampilkan form tambah transaksi.
     */
    public function create()
    {
        $items = Item::all();
        return view('transactions.create', compact('items'));
    }

    /**
     * Simpan data transaksi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_item' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil item dari database
        $item = Item::findOrFail($request->id_item);

        // Hitung total amount
        $amount = $item->harga_jual * $request->quantity;

        // Simpan transaksi
        Transaction::create([
            'id_item' => $request->id_item,
            'quantity' => $request->quantity,
            'price' => $item->harga_jual, // Harga jual dari item
            'amount' => $amount, // Harga jual * quantity
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    /**
     * Tampilkan detail transaksi.
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Tampilkan form edit transaksi.
     */
    public function edit(Transaction $transaction)
    {
        $items = Item::all();
        return view('transactions.edit', compact('transaction', 'items'));
    }

    /**
     * Update data transaksi.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'id_item' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
        // Ambil harga jual dari Item
        $item = Item::findOrFail($request->id_item);
        $amount = $item->harga_jual * $request->quantity;
    
        // Update transaksi
        $transaction->update([
            'id_item' => $request->id_item,
            'quantity' => $request->quantity,
            'price' => $item->harga_jual, // Harga jual diambil dari item
            'amount' => $amount, // Total dihitung otomatis
        ]);
    
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui!');
    }
    
    /**
     * Hapus data transaksi.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
