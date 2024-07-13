<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.user', [
            'users' => User::all(),
            'type' => Auth::user()->type
        ]);
    }

    public function add_user(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|max:255',
            'type' => 'required',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        return redirect(route('dashboard.user'))->with('pesan', 'Anda berhasil menambahkan user dengan ID ' . $user->id);
    }


    public function edit_user(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'type' => 'required',
        ]);

        $user = User::find($request->id);

        $user->update($validatedData);

        return redirect(route('dashboard.user'))->with('pesan', 'Data user dengan ID ' . $request->id . ' berhasil diperbarui');
    }

    public function delete_user($id)
    {
        $item = User::where('id', $id)->first();
        $item->delete();
        return redirect(route('dashboard.user'))->with('pesan', 'Anda berhasil menghapus user dengan ID ' . $id);
    }
}
