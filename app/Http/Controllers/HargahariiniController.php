<?php

namespace App\Http\Controllers;

use App\Models\HargaHariIni;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HargahariiniController extends Controller
{
    public function index(): View
    {
        $hargahariini = HargaHariIni::latest()->paginate(10);
        return view('hargahariini.index',compact('hargahariini'));
    }

    public function create(): View {
        return view('hargahariini.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([

            'id_hotel'=> 'required|unique:hargahariini,id_hotel',
            'harga' => 'required',
            'available_room' => 'required',
            'tanggal' => 'required',
            'id_kamar'=>'required'

        ]);

        HargaHariIni::create([
            'id_hotel' => $request->id_hotel,
            'harga' => $request->harga,
            'available_room' => $request->available_room,
            'tanggal' => $request->tanggal,
            'id_kamar' => $request->id_kamar
        ]);
        return redirect()->route('hargahariini.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $hargahariini = HargaHariIni::findOrFail($id);

        return view('hargahariini.show', compact('hargahariini'));
    }
    
    public function edit(string $id): View
    {
        $hargahariini = HargaHariIni::findOrFail($id);

        return view('hargahariini.edit', compact('hargahariini'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'harga' => 'required',
            'available_room' => 'required',
            'tanggal' => 'required',

        ]);

        $hargahariini = HargaHariIni::findOrFail($id);
        $hargahariini->update([
            'harga' => $request->harga,
            'available_room' => $request->available_room,
            'tanggal' => $request->tanggal,

            ]);

        return redirect()->route('hargahariini.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $hargahariini = HargaHariIni::findOrFail($id);
        $hargahariini->delete();
        return redirect()->route('hargahariini.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}