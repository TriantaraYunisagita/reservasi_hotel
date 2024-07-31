<?php

namespace App\Http\Controllers;

use App\Models\HargaHariIni;
use App\Models\Kamar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HargahariiniController extends Controller
{
    public function index(): View
    {
        $hargahariini = DB::table('hargahariini')
            ->join('kamar', 'kamar.id_kamar', '=', 'hargahariini.id_kamar')
            ->select('kamar.harga', 'kamar.nama_kamar', 'kamar.id_kamar', 'hargahariini.*')
            ->get();
        return view('levelAdmin.hargahariini.index', compact('hargahariini'));
    }

    public function create(): View
    {
        $kamar = Kamar::all();
        return view('levelAdmin.hargahariini.create', compact('kamar'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'available_room' => 'required',
            'tanggal' => 'required',
            'id_kamar' => 'required'

        ]);

        HargaHariIni::create([
            'available_room' => $request->available_room,
            'tanggal' => $request->tanggal,
            'id_kamar' => $request->id_kamar
        ]);
        return redirect()->route('admin.hargahariini.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $hargahariini = DB::table('hargahariini')
        ->join('kamar', 'kamar.id_kamar', '=', 'hargahariini.id_kamar')
        ->select('kamar.id_kamar', 'kamar.nama_kamar', 'kamar.harga', 'hargahariini.*')
        ->where('hargahariini.id_hotel', $id)
        ->first();
        return view('levelAdmin.hargahariini.show', compact('hargahariini'));
    }

    public function edit(string $id): View
    {
        $hargahariini = HargaHariIni::findOrFail($id);
        $kamar = Kamar::all();
        return view('levelAdmin.hargahariini.edit', compact('hargahariini', 'kamar'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'id_kamar' => 'required',
            'available_room' => 'required',
            'tanggal' => 'required'

        ]);

        $hargahariini = HargaHariIni::findOrFail($id);
        $hargahariini->update([
            'id_kamar' => $request->id_kamar,
            'available_room' => $request->available_room,
            'tanggal' => $request->tanggal
        ]);

        return redirect()->route('admin.hargahariini.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $hargahariini = HargaHariIni::findOrFail($id);
        $hargahariini->delete();
        return redirect()->route('admin.hargahariini.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
