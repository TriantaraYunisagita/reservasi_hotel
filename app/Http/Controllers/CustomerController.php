<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = DB::table('customers')
        ->join('users', 'users.id', '=', 'customers.customer_id')
        ->select('users.email', 'customers.*')
        ->get();
        return view('levelAdmin.customers.index',compact('customers'));
    }

    public function create(): View {
        $user = User::where('level', 'Customer')->get();
        return view('levelAdmin.customers.create', compact('user'));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([

            'customer_id'=> 'required',
            'nik' => 'required|unique:customers,nik',
            'nama_customer' => 'required',
            'negara' => 'required'

        ]);

        Customers::create([
            'customer_id' => $request->customer_id,
            'nik' => $request->nik,
            'nama_customer' => $request->nama_customer,
            'negara' => $request->negara,
        ]);
        return redirect()->route('admin.customers.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $customers = DB::table('customers')
        ->join('users', 'users.id', '=', 'customers.customer_id')
        ->select('users.email', 'customers.*')
        ->where('customers.nik', $id)
        ->first();
        return view('levelAdmin.customers.show', compact('customers'));
    }
    
    public function edit(string $id): View
    {
        $customers = Customers::findOrFail($id);

        return view('levelAdmin.customers.edit', compact('customers'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([

            'nama_customer' => 'required',
            'negara' => 'required'
        ]);

        $customers = Customers::findOrFail($id);
        $customers->update([
            'email' => $request->email,
            'negara' => $request->negara,
            ]);

        return redirect()->route('admin.customers.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $customers = Customers::findOrFail($id);
        $customers->delete();
        return redirect()->route('admin.customers.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}