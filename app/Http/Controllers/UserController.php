<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::paginate(5);
            return view('content.userlist', compact('users'));
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $error = '';
        try {
            $user = User::findOrFail($id);
        } catch (Exception $e) {
            $user = null;
            $error = 'User not found.';
        }
        return view('content.edituser', compact('user', ['error']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            $updatedUserData = $request->validated();
            User::findOrFail($id)->update($updatedUserData);
            return redirect(Route('users.index'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            User::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'User deleted Successfully');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
