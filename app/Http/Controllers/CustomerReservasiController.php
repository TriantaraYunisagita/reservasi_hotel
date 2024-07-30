<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CustomerReservasiController extends Controller
{
    public function index(): View
    {
        $id = auth()->user()->id;
        $reservasi = DB::table('reservasi')
            ->join('customers', 'customers.customer_id', '=', 'reservasi.customer_id')
            ->join('hargahariini', 'hargahariini.id_hotel', '=', 'reservasi.id_hotel')
            ->join('users', 'id', '=', 'customers.customer_id')
            ->select('customers.nama_customer', 'hargahariini.tanggal', 'reservasi.*')
            ->where('users.id', '=', $id)
            ->get();
        return view('levelCustomer.reservasi.index', compact('reservasi'));
    }

    public function show(string $id): View
    {
        $reservasi = DB::table('reservasi')
            ->join('customers', 'customers.customer_id', '=', 'reservasi.customer_id')
            ->join('hargahariini', 'hargahariini.id_hotel', '=', 'reservasi.id_hotel')
            ->select('customers.nama_customer', 'hargahariini.tanggal', 'reservasi.*')
            ->where('reservasi.id_reservasi', $id)
            ->first();
        return view('levelCustomer.reservasi.show', compact('reservasi'));
    }
}
