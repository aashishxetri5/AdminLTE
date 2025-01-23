<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Exception;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $authors = Author::paginate(6);
            if (count($authors) == 0) {
                return back()->with("error", "No authors found.");
            }
            return view("content.lms.authors", compact("authors"));
        } catch (Exception $e) {
            return redirect()->back()
                ->with("error", $e->getMessage());
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
    public function store(StoreAuthorRequest $request)
    {
        $newAuthor = $request->validated();
        try {
            Author::create($newAuthor);
            return redirect()->back("201")
                ->with("success", "Author added successfully.");
        } catch (Exception $e) {
            return redirect()->back()
                ->with("error", $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $author_id)
    {
        try {
            $author = Author::select('author_id', 'fullname', 'email')->find($author_id);
            if (!$author) {
                return back()->with("error", "Author not found.");
            }
            return view("content.lms.author-edit", compact("author"));
        } catch (Exception $e) {
            return back()->with("error", $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, string $author_id)
    {
        $updatedAuthor = $request->validated();
        
        try {
            Author::findOrFail($author_id)->update($updatedAuthor);

            return redirect()->back("200")
                ->with("success", "Author updated successfully.");

        } catch (Exception $e) {
            return redirect()->back()
                ->with("error", $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $author_id)
    {
        try {
            Author::destroy($author_id);
            return back()->with("success", "Author deleted successfully.");

        } catch (Exception $e) {
            return back()->with("error", $e->getMessage());
        }
    }
}
