<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Doctor;
use App\Models\GlobalSetting;
use App\Models\Service;
use App\Models\Unit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = GlobalSetting::first();
        $abouts = About::where('is_active', true)->get();
        $about = $abouts->first();
        
        $doctors = Doctor::query()
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->take(12)
            ->get();

        $polikliniks = Unit::query()
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->take(10)
            ->get();

        $featuredServices = Service::query()
            ->where('is_featured', true)
            ->take(3)
            ->get();
            
        $otherServices = Service::query()
            ->where('is_featured', false)
            ->take(3)
            ->get();
            
        $services = Service::all();

        return view('pages.home', compact('settings', 'about', 'abouts', 'doctors', 'polikliniks', 'services'));
    }
}
