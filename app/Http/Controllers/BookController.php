<?php
// File: app/Http/Controllers/BookController.php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $slideshowBooks = Book::whereNotNull('Image')->inRandomOrder()->limit(5)->get();
        $mostViewedBooks = Book::whereNotNull('Image')->orderBy('Views', 'desc')->take(20)->get();
        $mostLikedBooks = Book::whereNotNull('Image')->orderBy('Likes', 'desc')->take(20)->get();

        return view('welcome', compact('slideshowBooks', 'mostViewedBooks', 'mostLikedBooks'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        $book->increment('Views'); // Increment the Views count

        // Fetch 10 random books
        $randomBooks = Book::where('id', '!=', $id)->inRandomOrder()->limit(10)->get();

        // Fetch comments for the book
        $comments = Comment::where('book_id', $id)->latest()->get();

        return view('books.show', compact('book', 'randomBooks', 'comments'));
    }
    public function display(Request $request)
    {
        $sortField = $request->get('sort', 'Title'); // Default sort by Title
        $sortOrder = $request->get('order', 'asc'); // Default order ascending
        $perPage = $request->get('per_page', 10); // Default items per page

        $books = Book::orderBy($sortField, $sortOrder)->paginate($perPage);

        return view('books.display', compact('books', 'sortField', 'sortOrder', 'perPage'));
    }
}