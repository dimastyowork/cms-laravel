<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Unit;
use App\Models\Post;
use App\Models\Page;
use App\Models\GlobalSetting;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $settings = GlobalSetting::first();
        $query = $request->input('q', '');
        
        // Initialize empty collections
        $doctors = collect();
        $polyclinics = collect();
        $posts = collect();
        $pages = collect();
        
        // Only search if query is not empty
        if (!empty($query)) {
            $searchTerm = strtolower(trim($query));
            
            // Search Doctors (by name and specialization) - Standar SQL (Postgres & MySQL Safe)
            $doctors = Doctor::select('id', 'name', 'specialization', 'bio', 'photo', 'is_active', 'sort_order')
                ->where('is_active', true)
                ->where(function($q) use ($searchTerm) {
                    $q->whereRaw('LOWER(name) LIKE ?', ['%' . $searchTerm . '%'])
                      ->orWhereRaw('LOWER(specialization) LIKE ?', ['%' . $searchTerm . '%']);
                })
                ->orderBy('sort_order', 'asc')
                ->limit(20)
                ->get();
            
            // Search Polyclinics/Units - Standar SQL
            $polyclinics = Unit::select('id', 'name', 'slug', 'description', 'image', 'is_active', 'sort_order')
                ->where('is_active', true)
                ->where(function($q) use ($searchTerm) {
                    $q->whereRaw('LOWER(name) LIKE ?', ['%' . $searchTerm . '%'])
                      ->orWhereRaw('LOWER(description) LIKE ?', ['%' . $searchTerm . '%']);
                })
                ->orderBy('sort_order', 'asc')
                ->limit(10)
                ->get();
            
            // Search Posts - Standar SQL
            $posts = Post::select('id', 'title', 'slug', 'category', 'image', 'content', 'created_at', 'is_active')
                ->where('is_active', true)
                ->whereRaw('LOWER(title) LIKE ?', ['%' . $searchTerm . '%'])
                ->latest()
                ->limit(10)
                ->get();
            
            // Search Pages - Standar SQL
            $pages = Page::select('id', 'title', 'slug', 'content', 'is_active')
                ->where('is_active', true)
                ->whereRaw('LOWER(title) LIKE ?', ['%' . $searchTerm . '%'])
                ->latest()
                ->limit(10)
                ->get();
        }
        
        // Calculate total results
        $totalResults = $doctors->count() + $polyclinics->count() + $posts->count() + $pages->count();
        
        return view('pages.search', compact(
            'settings',
            'query',
            'doctors',
            'polyclinics',
            'posts',
            'pages',
            'totalResults'
        ));
    }
    public function suggestions(Request $request)
    {
        $query = $request->input('q', '');
        $results = [];

        if (!empty($query)) {
            $searchTerm = strtolower(trim($query));

            // Search Doctors (Limit 3)
            $doctors = Doctor::select('id', 'name', 'specialization', 'photo', 'is_active')
                ->where('is_active', true)
                ->where(function($q) use ($searchTerm) {
                    $q->whereRaw('LOWER(name) LIKE ?', ['%' . $searchTerm . '%'])
                      ->orWhereRaw('LOWER(specialization) LIKE ?', ['%' . $searchTerm . '%']);
                })
                ->limit(3)
                ->get()
                ->map(function($doctor) {
                    return [
                        'label' => $doctor->name,
                        'sublabel' => $doctor->specialization,
                        'category' => 'Dokter',
                        'image' => $doctor->photo_url,
                        'url' => route('doctor.show', $doctor->id)
                    ];
                });

            // Search Polyclinics (Limit 3)
            $polyclinics = Unit::select('id', 'name', 'slug', 'image', 'is_active')
                ->where('is_active', true)
                ->whereRaw('LOWER(name) LIKE ?', ['%' . $searchTerm . '%'])
                ->limit(3)
                ->get()
                ->map(function($poly) {
                    return [
                        'label' => $poly->name,
                        'category' => 'Poliklinik',
                        'image' => $poly->image_url,
                        'url' => route('polyclinic.show', $poly->slug)
                    ];
                });

            // Search Posts (Limit 3)
            $posts = Post::select('id', 'title', 'slug', 'image', 'category', 'is_active')
                ->where('is_active', true)
                ->whereRaw('LOWER(title) LIKE ?', ['%' . $searchTerm . '%'])
                ->limit(3)
                ->get()
                ->map(function($post) {
                    return [
                        'label' => $post->title,
                        'sublabel' => $post->category,
                        'category' => 'Berita',
                        'image' => is_null($post->image) ? null : asset('storage/' . $post->image),
                        'url' => route('post.show', $post->slug)
                    ];
                });

            $results = $doctors->concat($polyclinics)->concat($posts);
        }

        return response()->json($results);
    }
}
