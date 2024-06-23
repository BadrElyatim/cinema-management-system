<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index() {
        $movies = Movie::all();

        return view('welcome', [
            'movies' => $movies
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|url',
            'released_at' => 'required|date',
            'trailer' => 'required|url',
        ]);

        Movie::create($validatedData);

        return redirect('/movies')->with('success', 'Movie added successfully.');
    }

    public function show(Movie $movie) {
        return view('movie-details', [
            'movie' => $movie
        ]);
    }
}
