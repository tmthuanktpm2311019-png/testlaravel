<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->paginate(10);
        return view('backend.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('backend.movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:255',
            'release_date' => 'required|date',
            'poster_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bg_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:coming_soon,now_showing',
            'category' => 'required|string|max:255',
            'actor' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'trailer_url' => 'nullable|url',
            'slug' => 'required|string|unique:movies|max:255',
            'age' => 'nullable|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('poster_url')) {
            $data['poster_url'] = $request->file('poster_url')->store('posters', 'public');
        }
        if ($request->hasFile('bg_url')) {
            $data['bg_url'] = $request->file('bg_url')->store('backgrounds', 'public');
        }

        Movie::create($data);

        return redirect()->route('movies.index')->with('success', 'Phim đã được tạo thành công.');
    }

    public function edit(Movie $movie)
    {
        return view('backend.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:255',
            'release_date' => 'required|date',
            'poster_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bg_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:coming_soon,now_showing',
            'category' => 'required|string|max:255',
            'actor' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'trailer_url' => 'nullable|url',
            'slug' => 'required|string|max:255|unique:movies,slug,' . $movie->movie_id . ',movie_id',
            'age' => 'nullable|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('poster_url')) {
            // Delete old poster
            if ($movie->poster_url) {
                Storage::disk('public')->delete($movie->poster_url);
            }
            $data['poster_url'] = $request->file('poster_url')->store('posters', 'public');
        }

        if ($request->hasFile('bg_url')) {
            // Delete old background
            if ($movie->bg_url) {
                Storage::disk('public')->delete($movie->bg_url);
            }
            $data['bg_url'] = $request->file('bg_url')->store('backgrounds', 'public');
        }

        $movie->update($data);

        return redirect()->route('movies.index')->with('success', 'Phim đã được cập nhật thành công.');
    }

    public function destroy(Movie $movie)
    {
        // Delete images
        if ($movie->poster_url) {
            Storage::disk('public')->delete($movie->poster_url);
        }
        if ($movie->bg_url) {
            Storage::disk('public')->delete($movie->bg_url);
        }

        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Phim đã được xóa thành công.');
    }
}
