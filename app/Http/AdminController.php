<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Kino qo'shish (Admin uchun)
     * POST: /api/admin/movie/add
     */
    public function addMovie(Request $request)
    {
        // Validatsiya
        $validated = $request->validate([
            'code' => 'required|unique:movies,code|numeric|max_digits:6',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'poster_url' => 'nullable|url',
            'channel_id' => 'required|string', // @channel_name yoki -1001234567890
            'message_id' => 'required|numeric',
            'duration' => 'nullable|string',
            'release_year' => 'nullable|numeric|digits:4',
            'genre' => 'nullable|string|max:255',
        ]);

        try {
            $movie = Movie::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Kino qo\'shildi!',
                'movie' => $movie
            ], 201);

        } catch (\Exception $e) {
            Log::error("Kino qo'shish xatosi: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Kinoni tahrirlash
     * PUT: /api/admin/movie/{id}
     */
    public function updateMovie(Request $request, $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json([
                'success' => false,
                'error' => 'Kino topilmadi'
            ], 404);
        }

        $validated = $request->validate([
            'code' => 'sometimes|unique:movies,code,' . $id,
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'poster_url' => 'nullable|url',
            'duration' => 'nullable|string',
            'release_year' => 'nullable|numeric|digits:4',
            'genre' => 'nullable|string|max:255',
        ]);

        $movie->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Kino tahrirlandi!',
            'movie' => $movie
        ]);
    }

    /**
     * Kinoni o'chirish
     * DELETE: /api/admin/movie/{id}
     */
    public function deleteMovie($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json([
                'success' => false,
                'error' => 'Kino topilmadi'
            ], 404);
        }

        $movie->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kino o\'chirildi!'
        ]);
    }

    /**
     * Barcha kinolarni ko'rish
     * GET: /api/admin/movies?page=1
     */
    public function getAllMovies(Request $request)
    {
        $movies = Movie::paginate(20);

        return response()->json([
            'success' => true,
            'data' => $movies
        ]);
    }

    /**
     * Bitta kinoni ko'rish
     * GET: /api/admin/movie/{id}
     */
    public function getMovie($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json([
                'success' => false,
                'error' => 'Kino topilmadi'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'movie' => $movie
        ]);
    }

    /**
     * Statistika
     * GET: /api/admin/stats
     */
    public function getStats()
    {
        $totalMovies = Movie::count();
        $totalViews = Movie::sum('views');
        $mostViewed = Movie::orderBy('views', 'DESC')->first();

        return response()->json([
            'success' => true,
            'stats' => [
                'total_movies' => $totalMovies,
                'total_views' => $totalViews,
                'most_viewed' => $mostViewed
            ]
        ]);
    }
}