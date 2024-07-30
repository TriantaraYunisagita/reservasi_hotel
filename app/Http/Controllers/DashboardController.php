<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function adminDashboard(): View
    {
        if (auth()->user()->level != 'Admin') {
            abort(404);
        }
        return view('levelAdmin.dashboard');
    }

    public function customerDashboard(): View
    {
        if (auth()->user()->level != 'Customer') {
            abort(404);
        }
        $id = auth()->user()->id;
        $countPembayaran = DB::table('pembayaran')
            ->join('customers', 'customers.customer_id', '=', 'pembayaran.customer_id')
            ->join('invoice', 'invoice.id_invoice', '=', 'pembayaran.id_invoice')
            ->join('reservasi', 'reservasi.id_reservasi', '=', 'invoice.id_reservasi')
            ->join('hargahariini', 'hargahariini.id_hotel', '=', 'reservasi.id_hotel')
            ->join('users', 'users.id', '=', 'pembayaran.customer_id')
            ->select('hargahariini.tanggal', 'customers.nama_customer', 'invoice.status', 'pembayaran.*')
            ->where('users.id', '=', $id)
            ->count();

        $id = auth()->user()->id;
        $countReservasi = DB::table('reservasi')
            ->join('customers', 'customers.customer_id', '=', 'reservasi.customer_id')
            ->join('hargahariini', 'hargahariini.id_hotel', '=', 'reservasi.id_hotel')
            ->join('users', 'id', '=', 'customers.customer_id')
            ->select('customers.nama_customer', 'hargahariini.tanggal', 'reservasi.*')
            ->where('users.id', '=', $id)
            ->count();
        return view('levelCustomer.dashboard', compact('countPembayaran', 'countReservasi'));
    }
}
