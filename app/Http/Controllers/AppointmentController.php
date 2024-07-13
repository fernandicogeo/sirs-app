<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('appointment', [
            'doctors' => Doctor::all(),
            'appointments' => Appointment::all(),
            'type' => Auth::user()->type
        ]);
    }

    public function add_appointment(Request $request)
    {
        if (Auth::user()->type == 3) {
            $validatedData = $request->validate([
                'patient_id' => 'required',
                'doctor_id' => 'required',
                'email' => 'required',
                'schedule' => 'required',
            ]);

            $validatedData['status'] = 0;

            $appointment = Appointment::create($validatedData);

            return redirect(route('home'))->with('pesan', 'Anda berhasil menambahkan appointment dengan ID ' . $appointment->id);
        }
    }

    public function edit_appointment(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'email' => 'required',
            'schedule' => 'required',
        ]);

        $appointment = Appointment::find($request->id);

        $appointment->update($validatedData);

        return redirect(route('dashboard.appointment'))->with('pesan', 'Data appointment dengan ID ' . $request->id . ' berhasil diperbarui');
    }

    public function delete_appointment($id)
    {
        $item = Appointment::where('id', $id)->first();
        $item->delete();
        return redirect(route('dashboard.appointment'))->with('pesan', 'Anda berhasil menghapus appointment dengan ID ' . $id);
    }
}
