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
        
        $query = Doctor::query()->where('is_active', true);

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('specialization') && $request->specialization != '') {
            $query->where('specialization', $request->specialization);
        }

        $doctors = $query->orderBy('sort_order', 'asc')
            ->latest()
            ->paginate(12);

        return view('pages.doctor.index', compact('settings', 'doctors'));
    }

    public function show(Doctor $doctor)
    {
        $settings = GlobalSetting::first();
        
        // Load doctor's schedules and related units (polyclinics)
        $doctor->load(['schedules.unit']);

        return view('pages.doctor.show', compact('settings', 'doctor'));
    }
}
