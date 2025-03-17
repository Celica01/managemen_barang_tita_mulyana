<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Menampilkan daftar item.
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * Menampilkan form tambah item.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Menyimpan item baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_item' => 'required|string|max:255',
            'uom' => 'required|string|max:50',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit item.
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Menyimpan perubahan item ke database.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nama_item' => 'required|string|max:255',
            'uom' => 'required|string|max:50',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item berhasil diperbarui!');
    }

    /**
     * Menghapus item dari database.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item berhasil dihapus!');
    }
}
