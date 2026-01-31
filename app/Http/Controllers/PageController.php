<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\GlobalSetting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(Page $page)
    {
        if (!$page->is_active) {
            abort(404);
        }

        $settings = GlobalSetting::first();

        return view('pages.page.show', compact('page', 'settings'));
    }
}
