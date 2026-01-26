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
        $departments = Unit::latest()->paginate(12);

        return view('pages.polyclinic.index', compact('settings', 'departments'));
    }
}
