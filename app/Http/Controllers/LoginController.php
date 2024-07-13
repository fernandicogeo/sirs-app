<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login', [
            'type' => Auth::check() ? Auth::user()->type : 0
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only(['password']);
        $email = $request->email;

        // Check if the input is an email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (Auth::guard('web')->attempt(['email' => $email, 'password' => $credentials['password']])) {
                if (Auth::user()->type === '3') {
                    $request->session()->regenerate();
                    return redirect(route('home'));
                } else {
                    $request->session()->regenerate();
                    return redirect(route('dashboard'));
                }
            }
        }

        return back()->with('pesanError', 'Email atau password anda salah!');
    }

    public function register()
    {
        return view('register', [
            'type' => Auth::check() ? Auth::user()->type : 0
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|max:255',
            'confirm_password' => 'required|max:255',
        ]);


        if ($validatedData['password'] !== $validatedData['confirm_password']) {
            return redirect()->back()->with('pesanError', 'Password dan konfirmasi password tidak cocok.');
        }

        $validatedDataUser['name'] = $validatedData['name'];
        $validatedDataUser['email'] = $validatedData['email'];
        $validatedDataUser['password'] = bcrypt($validatedData['password']);
        $validatedDataUser['type'] = 3;

        User::create($validatedDataUser);

        return redirect(route('login'))->with('pesan', 'Anda berhasil registrasi');
    }
}
