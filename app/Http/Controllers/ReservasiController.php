<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\HargaHariIni;
use App\Models\Reservasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ReservasiController extends Controller
{
    public function index(): View
    {
        $reservasi = DB::table('reservasi')
            ->join('customers', 'customers.customer_id', '=', 'reservasi.customer_id')
            ->join('hargahariini', 'hargahariini.id_hotel', '=', 'reservasi.id_hotel')
            ->select('customers.nama_customer', 'hargahariini.tanggal', 'reservasi.*')
            ->get();
        return view('levelAdmin.reservasi.index', compact('reservasi'));
    }

    public function create(): View
    {
        $customers = Customers::all();
        $hargahariini = HargaHariIni::all();
        return view('levelAdmin.reservasi.create', compact('customers', 'hargahariini'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'customer_id' => 'required',
            'id_hotel' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required'

        ]);

        Reservasi::create([
            'customer_id' => $request->customer_id,
            'id_hotel' => $request->id_hotel,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
        ]);
        return redirect()->route('admin.reservasi.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $reservasi = DB::table('reservasi')
            ->join('customers', 'customers.customer_id', '=', 'reservasi.customer_id')
            ->join('hargahariini', 'hargahariini.id_hotel', '=', 'reservasi.id_hotel')
            ->select('customers.nama_customer', 'hargahariini.tanggal', 'reservasi.*')
            ->where('reservasi.id_reservasi', $id)
            ->first();
        return view('levelAdmin.reservasi.show', compact('reservasi'));
    }

    public function edit(string $id): View
    {
        $reservasi = Reservasi::findOrFail($id);
        $customers = Customers::all();
        $hargahariini = HargaHariIni::all();
        return view('levelAdmin.reservasi.edit', compact('reservasi', 'customers', 'hargahariini'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'customer_id' => 'required',
            'id_hotel' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required'
        ]);

        $reservasi = Reservasi::findOrFail($id);
        $reservasi->update([
            'customer_id' => $request->customer_id,
            'id_hotel' => $request->id_hotel,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
        ]);

        return redirect()->route('admin.reservasi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();
        return redirect()->route('admin.reservasi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
