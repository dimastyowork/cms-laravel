<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\GlobalSetting;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $settings = GlobalSetting::first();
        
        $query = Doctor::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('specialization') && $request->specialization != '') {
            $query->where('specialization', $request->specialization);
        }

        $doctors = $query->latest()->paginate(12);

        return view('pages.doctor.index', compact('settings', 'doctors'));
    }
}
