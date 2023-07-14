<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;

class ContactController extends Controller
{
    public function showForm()
{
    // Retrieve all responses from the 'responses' table
    $responses = Response::all();

    // Render the form view with the responses
    return view('welcome', compact('responses'));
}

    public function submit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|alpha',
            'email' => 'required|email',
            'message' => 'required',
        ]
    );

         // Save the form data into the 'responses' table
        Response::create($validatedData);

        $responses = Response::all();

        // Redirect the user back to the form with a success message
       return redirect()->back()->with('success', 'Thank you for your message!');
    }
}
