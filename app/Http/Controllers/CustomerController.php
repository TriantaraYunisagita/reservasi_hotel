<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = Customers::latest()->paginate(10);
        return view('customers.index',compact('customers'));
    }

    public function create(): View {
        return view('customers.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([

            'customer_id'=> 'required|unique:customers,customer_id',
            'nik' => 'required',
            'nama_customer' => 'required',
            'email' => 'required',
            'negara' => 'required'

        ]);

        Customers::create([
            'customer_id' => $request->customer_id,
            'nik' => $request->nik,
            'nama_customer' => $request->nama_customer,
            'email' => $request->email,
            'negara' => $request->negara,
        ]);
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $customers = Customers::findOrFail($id);

        return view('customers.show', compact('customers'));
    }
    
    public function edit(string $id): View
    {
        $customers = Customers::findOrFail($id);

        return view('customers.edit', compact('customers'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([

            'nik' => 'required',
            'nama_customer' => 'required',
            'email' => 'required',
            'negara' => 'required'
        ]);

        $customers = Customers::findOrFail($id);
        $customers->update([

            'nik' => $request->nik,
            'nama_customer' => $request->nama_customer,
            'email' => $request->email,
            'negara' => $request->negara,
            ]);

        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $customers = Customers::findOrFail($id);
        $customers->delete();
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}