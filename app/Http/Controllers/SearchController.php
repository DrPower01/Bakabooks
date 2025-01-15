<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $books = Book::where('Title', 'like', "%{$query}%")
            ->orWhere('Author', 'like', "%{$query}%")
            ->orWhere('Publisher', 'like', "%{$query}%")
            ->orWhere('ISBN', 'like', "%{$query}%")
            ->get();

        return view('books.search', compact('books', 'query'));
    }
}