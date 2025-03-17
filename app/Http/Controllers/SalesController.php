<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Customer;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Tampilkan daftar sales.
     */
    public function index()
    {
        $sales = Sales::with('customer')->get();
        return view('sales.index', compact('sales'));
    }

    /**
     * Tampilkan form tambah sales.
     */
    public function create()
    {
        $customers = Customer::all();
        return view('sales.create', compact('customers'));
    }

    /**
     * Simpan data sales baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl_sales' => 'required|date',
            'id_customer' => 'required|exists:customers,id',
            'do_number' => 'required|string|unique:sales',
            'status' => 'required|string',
        ]);

        Sales::create($request->all());

        return redirect()->route('sales.index')->with('success', 'Sales berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail sales.
     */
    public function show(Sales $sale)
    {
        return view('sales.show', compact('sale'));
    }

    /**
     * Tampilkan form edit sales.
     */
    public function edit(Sales $sale)
    {
        $customers = Customer::all();
        return view('sales.edit', compact('sale', 'customers'));
    }

    /**
     * Update data sales.
     */
    public function update(Request $request, Sales $sale)
    {
        $request->validate([
            'tgl_sales' => 'required|date',
            'id_customer' => 'required|exists:customers,id',
            'do_number' => 'required|string|unique:sales,do_number,' . $sale->id,
            'status' => 'required|string',
        ]);

        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Sales berhasil diperbarui.');
    }

    /**
     * Hapus data sales.
     */
    public function destroy(Sales $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Sales berhasil dihapus.');
    }
}
