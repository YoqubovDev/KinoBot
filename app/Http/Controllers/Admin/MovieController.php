<?php
// app/Http/Controllers/Admin/MovieController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('id', 'desc')->paginate(20);
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:movies',
            'title' => 'required',
            'channel_username' => 'required',
            'message_id' => 'required|integer'
        ]);

        Movie::create($request->all());

        return redirect()->route('admin.movies.index')
            ->with('success', 'Kino muvaffaqiyatli qoʻshildi!');
    }

    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'code' => 'required|unique:movies,code,' . $movie->id,
            'title' => 'required'
        ]);

        $movie->update($request->all());

        return redirect()->route('admin.movies.index')
            ->with('success', 'Kino muvaffaqiyatli yangilandi!');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        
        return redirect()->route('admin.movies.index')
            ->with('success', 'Kino muvaffaqiyatli oʻchirildi!');
    }
}