<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $user = User::latest()->paginate(10);
        return view('levelAdmin.user.index',compact('user'));
    }

    public function create(): View {
        return view('levelAdmin.user.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([

            'username'=> 'required|min:5',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5',
            'level' => 'required'

        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request['password']), 
            'level' => $request->level,
        ]);
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $user = User::findOrFail($id);

        return view('levelAdmin.user.show', compact('user'));
    }
    
    public function edit(string $id): View
    {
        $user = User::findOrFail($id);

        return view('levelAdmin.user.edit', compact('user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([

            'username' => 'required',
            'level' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([

            'username' => $request->username,
            'level' => $request->level,
            ]);

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
