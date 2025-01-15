<?php
// File: app/Http/Controllers/CommentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
            'book_id' => 'required|exists:books,id',
        ]);

        if (Auth::check()) {
            Comment::create([
                'comment' => $request->comment,
                'book_id' => $request->book_id,
                'user_id' => Auth::id(),
                'username' => Auth::user()->name, // Assuming the User model has a 'name' attribute
            ]);

            return redirect()->back()->with('success', 'Comment added successfully!');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to add a comment.');
        }
    }
}