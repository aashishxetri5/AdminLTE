<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ComplainController extends Controller
{
    public function index()
    {
        return view('content.complain');
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'email' => ['required', 'email'],
                'details' => ['required'],
                'file' => ['required', 'file', 'max:1024'],
            ]);

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            $path = public_path('complaints/') . $filename;

            $file->move(public_path('complaints\\'), $filename);

            $complaint = Complain::create([
                'email' => $request->email,
                'details' => $request->details,
                'file' => 'complaints/' . $filename,
            ]);

            $complaint->save();
            return redirect()->route('complain.index')->with('success', 'Complaint registered successfully');
        } catch (Exception $e) {
            return redirect()->route('complain.index')->with('error', 'failed to register complain');
        }
    }

    public function showComplainList()
    {
        $complaintList = Complain::orderBy('created_at', 'desc')->get();
        return view('content.complainLists', compact('complaintList'));
    }

    public function destroy($id)
    {

        try {
            $complaint = Complain::find($id);


            $status = $complaint->delete();

            File::delete(public_path('/' . $complaint->file));

            if ($status) {
                return back()->with('success', 'Complaint resolved successfully');
            } else {
                return back()->with('error', 'Could not resolve the complaint');
            }
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

    }
}

