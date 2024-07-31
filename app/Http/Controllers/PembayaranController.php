<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Invoice;
use App\Models\Pembayaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PembayaranController extends Controller
{
    public function index(): View
    {
        $pembayaran = DB::table('pembayaran')
            ->join('customers', 'customers.customer_id', '=', 'pembayaran.customer_id')
            ->join('invoice', 'invoice.id_invoice', '=', 'pembayaran.id_invoice')
            ->join('reservasi', 'reservasi.id_reservasi', '=', 'invoice.id_reservasi')
            ->join('hargahariini', 'hargahariini.id_hotel', '=', 'reservasi.id_hotel')
            ->select('hargahariini.tanggal', 'customers.nama_customer', 'invoice.status', 'pembayaran.*')
            ->get();
        return view('levelAdmin.pembayaran.index', compact('pembayaran'));
    }

    public function create(): View
    {
        $customers = Customers::all();
        $invoice = Invoice::all();
        return view('levelAdmin.pembayaran.create', compact('customers', 'invoice'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'customer_id' => 'required',
            'id_invoice' => 'required',
            'metode_bayar' => 'required',
        ]);

        Pembayaran::create([
            'customer_id' => $request->customer_id,
            'id_invoice' => $request->id_invoice,
            'metode_bayar' => $request->metode_bayar,
        ]);
        return redirect()->route('admin.pembayaran.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $pembayaran = DB::table('pembayaran')
            ->join('customers', 'customers.customer_id', '=', 'pembayaran.customer_id')
            ->join('invoice', 'invoice.id_invoice', '=', 'pembayaran.id_invoice')
            ->join('reservasi', 'reservasi.id_reservasi', '=', 'invoice.id_reservasi')
            ->join('hargahariini', 'hargahariini.id_hotel', '=', 'reservasi.id_hotel')
            ->select('hargahariini.tanggal', 'customers.nama_customer', 'invoice.status', 'pembayaran.*')
            ->where('pembayaran.id_payment', $id)
            ->first();
        return view('levelAdmin.pembayaran.show', compact('pembayaran'));
    }

    public function edit(string $id): View
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $customers = Customers::all();
        $invoice = Invoice::all();
        return view('levelAdmin.pembayaran.edit', compact('pembayaran', 'customers', 'invoice'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'customer_id' => 'required',
            'id_invoice' => 'required',
            'metode_bayar' => 'required',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'customer_id' => $request->customer_id,
            'id_invoice' => $request->id_invoice,
            'metode_bayar' => $request->metode_bayar,
        ]);

        return redirect()->route('admin.pembayaran.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect()->route('admin.pembayaran.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
