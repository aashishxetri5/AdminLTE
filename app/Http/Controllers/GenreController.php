<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;
use Exception;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $genres = Genre::paginate(5);
            if (count($genres) == 0) {
                return response()->json(["message" => "No genres found."], 404);
            }
            return view('content.lms.genres', ["genres" => $genres]);
            # return back()->throwResponse()->json(["genres", $genres], 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        $newGenre = $request->validated();

        try {
            Genre::create($newGenre);
            return redirect()->back(201);
        } catch (Exception $e) {
            return redirect()->back(500)->with("error", "Failed to create genre. " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $genre_id)
    {
        try {
            $genre = Genre::select('genre_id', 'name', 'description')->findOrFail($genre_id);
            return view('content.lms.genresedit', compact('genre'));
        } catch (Exception $e) {
            return back()->with("error", $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, string $genre_id)
    {
        $validatedModifiedGenre = $request->validated();
        try {
            Genre::findOrFail($genre_id)->update($validatedModifiedGenre);
            return redirect()->back("200")->with("success", "Genre updated successfully.");
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $genre_id)
    {
        try {
            Genre::destroy($genre_id);
            return redirect()->back()->with("success", "Genre deleted successfully.");

        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
