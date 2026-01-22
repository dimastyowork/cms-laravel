<?php

namespace App\Http\Controllers;

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
        
        $doctors = Doctor::query()
            ->latest()
            ->take(4)
            ->get();

        $departments = Unit::query()
            ->latest()
            ->take(4) // Or however many you want to show
            ->get();

        $featuredServices = Service::query()
            ->where('is_featured', true)
            ->take(3)
            ->get();
            
        $otherServices = Service::query()
            ->where('is_featured', false) // Or just take others
            ->take(3)
            ->get();
            
        // Or send all services and filter in view, but let's just send 'services' generally if UI allows
        $services = Service::all();

        return view('pages.home', compact('settings', 'doctors', 'departments', 'services'));
    }
}
