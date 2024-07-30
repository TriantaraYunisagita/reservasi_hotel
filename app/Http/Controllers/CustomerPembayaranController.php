<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CustomerPembayaranController extends Controller
{
    public function index(): View
    {
        $id = auth()->user()->id;
        $pembayaran = DB::table('pembayaran')
            ->join('customers', 'customers.customer_id', '=', 'pembayaran.customer_id')
            ->join('invoice', 'invoice.id_invoice', '=', 'pembayaran.id_invoice')
            ->join('reservasi', 'reservasi.id_reservasi', '=', 'invoice.id_reservasi')
            ->join('hargahariini', 'hargahariini.id_hotel', '=', 'reservasi.id_hotel')
            ->join('users', 'users.id', '=', 'pembayaran.customer_id')
            ->select('hargahariini.tanggal', 'customers.nama_customer', 'invoice.status', 'pembayaran.*')
            ->where('users.id', '=', $id)
            ->get();
        return view('levelCustomer.pembayaran.index', compact('pembayaran'));
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
        return view('levelCustomer.pembayaran.show', compact('pembayaran'));
    }
}
