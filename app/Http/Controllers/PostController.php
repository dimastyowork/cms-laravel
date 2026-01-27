<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\GlobalSetting;

class PostController extends Controller
{
    public function index()
    {
        $settings = GlobalSetting::first();
        $posts = Post::where('is_active', true)->latest()->paginate(9);
        return view('pages.post.index', compact('settings', 'posts'));
    }

    public function show($slug)
    {
        $settings = GlobalSetting::first();
        $post = Post::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('pages.post.show', compact('settings', 'post'));
    }
}
