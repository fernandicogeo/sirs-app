<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('index', [
            'doctors' => Doctor::all(),
            'type' => Auth::check() ? Auth::user()->type : 0
        ]);
    }
}
