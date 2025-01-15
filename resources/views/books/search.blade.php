<!-- filepath: /home/drpower/Documents/BakaBooks/resources/views/books/search.blade.php -->

<x-layout>
    <style>
        /* Style the search input text to be black */
        input[name="query"] {
            color: black;
        }

        /* Style the placeholder text to be black */
        input[name="query"]::placeholder {
            color: black;
        }
    </style>

    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Search Results for "{{ $query }}"</h1>

        <form action="{{ route('search') }}" method="GET" class="mb-4">
            <input 
                type="text" 
                name="query" 
                placeholder="Rechercher par titre, auteur ou ISBN" 
                class="w-full p-2 border border-gray-300 rounded text-black"
                value="{{ request('query') }}"
            />
            <button type="submit" class="ml-2 p-2 bg-blue-500 text-white rounded">Search</button>
        </form>

        @if($books->isEmpty())
            <p>No books found.</p>
        @else
            <ul>
                @foreach($books as $book)
                    <li class="mb-2">
                        <a href="{{ route('books.show', $book->id) }}" class="text-blue-500 hover:underline">
                        {{ $book->Title }} par {{ $book->Author }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-layout>