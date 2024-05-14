<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KamarController extends Controller
{
    public function index(): View
    {
        $kamar = Kamar::latest()->paginate(10);
        return view('kamar.index',compact('kamar'));
    }

    public function create(): View {
        return view('kamar.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([

            'id_kamar'=> 'required|unique:kamar,id_kamar',
            'nama_kamar' => 'required',
            'jenis_kamar' => 'required',
            'ukuran_kamar' => 'required',
            'harga' => 'required'

        ]);

        Kamar::create([
            'id_kamar' => $request->id_kamar,
            'nama_kamar' => $request->nama_kamar,
            'jenis_kamar' => $request->jenis_kamar,
            'ukuran_kamar' => $request->ukuran_kamar,
            'harga' => $request->harga,
        ]);
        return redirect()->route('kamar.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $kamar = Kamar::findOrFail($id);

        return view('kamar.show', compact('kamar'));
    }
    
    public function edit(string $id): View
    {
        $kamar = Kamar::findOrFail($id);

        return view('kamar.edit', compact('kamar'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_kamar' => 'required',
            'jenis_kamar' => 'required',
            'ukuran_kamar' => 'required',
            'harga' => 'required'
        ]);

        $kamar = Kamar::findOrFail($id);
        $kamar->update([
            'nama_kamar' => $request->nama_kamar,
            'jenis_kamar' => $request->jenis_kamar,
            'ukuran_kamar' => $request->ukuran_kamar,
            'harga' => $request->harga,
            ]);

        return redirect()->route('kamar.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();
        return redirect()->route('kamar.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}