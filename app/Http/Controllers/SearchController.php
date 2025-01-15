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
            ->paginate(30); // Add pagination with 30 books per page
    
        return view('books.search', compact('books', 'query'));
    }
}