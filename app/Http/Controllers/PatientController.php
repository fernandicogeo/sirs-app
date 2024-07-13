<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
        if (Auth::user()->type == 1 || Auth::user()->type == 2) {
            return view('dashboard.patient', [
                'patients' => Patient::all(),
                'type' => Auth::user()->type
            ]);
        }
    }

    public function add_patient(Request $request)
    {
        if (Auth::user()->type == 1) {
            $validatedData = $request->validate([
                'id' => 'required',
                'id_patient' => 'required',
                'age' => 'required|integer',
                'sex' => 'required|in:M,F',
                'diagnoses' => 'required',
                'descOfDiagnoses' => 'required',
            ]);

            Patient::create($validatedData);

            return redirect(route('dashboard.patient'))->with('pesan', 'Anda berhasil menambahkan pasien dengan ID ' . $request->id);
        }
    }


    public function edit_patient(Request $request)
    {
        if (Auth::user()->type == 1) {
            $validatedData = $request->validate([
                'id' => 'required|exists:datapatients,id',
                'id_patient' => 'required|string|max:255',
                'age' => 'required|integer',
                'sex' => 'required|string|in:M,F',
                'diagnoses' => 'required|string|max:255',
                'descOfDiagnoses' => 'required|string|max:255',
            ]);

            $patient = Patient::find($validatedData['id']);
            $patient->update($validatedData);

            return redirect(route('dashboard.patient'))->with('pesan', 'Data pasien dengan ID ' . $request->id . ' berhasil diperbarui');
        }
    }

    public function delete_patient($id)
    {
        if (Auth::user()->type == 1) {
            $item = Patient::where('id', $id)->first();
            $item->delete();
            return redirect(route('dashboard.patient'))->with('pesan', 'Anda berhasil menghapus pasien dengan ID ' . $id);
        }
    }
}
