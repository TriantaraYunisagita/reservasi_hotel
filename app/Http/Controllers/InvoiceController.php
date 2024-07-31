<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Reservasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function index(): View
    {
        $invoice = DB::table('invoice')
            ->join('reservasi', 'reservasi.id_reservasi', '=', 'invoice.id_reservasi')
            ->select('reservasi.tanggal_mulai', 'reservasi.tanggal_akhir', 'invoice.*')
            ->get();
        return view('levelAdmin.invoice.index', compact('invoice'));
    }

    public function create(): View
    {
        $reservasi = Reservasi::all();
        return view('levelAdmin.invoice.create', compact('reservasi'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'id_reservasi' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'besar_dp' => 'required'

        ]);

        Invoice::create([
            'id_reservasi' => $request->id_reservasi,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'besar_dp' => $request->besar_dp,
        ]);
        return redirect()->route('admin.invoice.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $invoice = DB::table('invoice')
            ->join('reservasi', 'reservasi.id_reservasi', '=', 'invoice.id_reservasi')
            ->select('reservasi.tanggal_mulai', 'reservasi.tanggal_akhir', 'invoice.*')
            ->where('invoice.id_invoice', $id)
            ->first();
        return view('levelAdmin.invoice.show', compact('invoice'));
    }

    public function edit(string $id): View
    {
        $invoice = Invoice::findOrFail($id);
        $reservasi = Reservasi::all();
        return view('levelAdmin.invoice.edit', compact('invoice', 'reservasi'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'id_reservasi' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'besar_dp' => 'required'
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'id_reservasi' => $request->id_reservasi,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'besar_dp' => $request->besar_dp,
        ]);

        return redirect()->route('admin.invoice.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return redirect()->route('admin.invoice.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
