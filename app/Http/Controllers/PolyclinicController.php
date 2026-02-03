<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\GlobalSetting;
use Illuminate\Http\Request;

class PolyclinicController extends Controller
{
    public function index()
    {
        $settings = GlobalSetting::first();
        $polikliniks = Unit::query()
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->paginate(12);

        return view('pages.polyclinic.index', compact('settings', 'polikliniks'));
    }

    public function show(Unit $unit)
    {
        $settings = GlobalSetting::first();
        $unit->load(['schedules.doctor']);

        return view('pages.polyclinic.show', compact('settings', 'unit'));
    }
}
