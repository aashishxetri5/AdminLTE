<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Genre;
use Exception;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $books = Book::with(['authors', 'genres'])->get();
            $authors = Author::all()->select('author_id', 'fullname');
            $genres = Genre::all()->select('genre_id', 'name');
            $bind = ["authors" => $authors, "genres" => $genres];

            return view("content.lms.books", compact("books", "bind"));

        } catch (Exception $e) {
            return back()->with("error", "Failed to fetch books. " . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // dd($request->all());
        $request->validated();
        try {
            $book = Book::create($request->only('title', 'description', 'stock', 'status', 'cover'));

            // save file to storage_path('app/public/books');
            $book['cover'] = $request->file('cover')->store('public/books');
            $book->save();

            $book->authors()->attach($request->input('author_id'));
            $book->genres()->attach($request->input('genre_id'));
            return back();
        } catch (Exception $e) {
            dd($e);
            return back()->with("error", "Failed to add book. " . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
