<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index()
    {
        return view('dashboard.doctor', [
            'doctors' => Doctor::all(),
            'type' => Auth::user()->type
        ]);
    }

    public function add_doctor(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'name_pref' => 'required',
            'clinic_address' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'specialty_ids' => 'required',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->img_path->extension();
        $request->img_path->storeAs('public/', $imageName);

        $validatedData['img_path'] = 'storage/' . $imageName;

        $doctor = Doctor::create($validatedData);

        return redirect(route('dashboard.doctor'))->with('pesan', 'Anda berhasil menambahkan dokter dengan ID ' . $doctor->id);
    }


    public function edit_doctor(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'name_pref' => 'required',
            'clinic_address' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'specialty_ids' => 'required',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $doctor = Doctor::find($request->id);

        if ($request->hasFile('img_path')) {
            Storage::delete('public/' . $doctor->img_path);

            $imageName = time() . '.' . $request->img_path->extension();
            $request->img_path->storeAs('public/', $imageName);

            $validatedData['img_path'] = 'storage/' . $imageName;
        }

        $doctor->update($validatedData);

        return redirect(route('dashboard.doctor'))->with('pesan', 'Data dokter dengan ID ' . $request->id . ' berhasil diperbarui');
    }

    public function delete_doctor($id)
    {
        $item = Doctor::where('id', $id)->first();
        $item->delete();
        return redirect(route('dashboard.doctor'))->with('pesan', 'Anda berhasil menghapus dokter dengan ID ' . $id);
    }
}
