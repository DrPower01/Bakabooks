<!-- filepath: /home/drpower/Documents/BakaBooks/resources/views/books/show.blade.php -->

<x-layout>
    <style>
        .comment-section button {
            background-color: lightblue;
            color: black !important;
        }
        .comment-section input[type="text"],
        .comment-section textarea {
            color: black;
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }
        /* Book Detail Container */
        .book-detail-container {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .book-detail-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .book-detail-header h1 {
            font-size: 36px;
            color: white;
            margin: 0;
        }

        .book-detail-body {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 20px;
        }

        .book-detail-image img {
            width: 100%;
            max-width: 300px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgb(0, 0, 0);
        }

        .book-detail-info {
            flex: 1;
            max-width: 600px;
            padding: 20px;
        }

        .book-detail-info p {
            font-size: 18px;
            color: white;
            margin-bottom: 10px;
        }

        .book-detail-info strong {
            color: lightblue;
        }

        @media (max-width: 768px) {
            .book-detail-body {
                flex-direction: column;
                align-items: center;
            }

            .book-detail-image {
                order: -1;
            }
        }
    </style>

    <div class="book-detail-container">
        <div class="book-detail-header">
            <h1>{{ $book->Title }}</h1>
        </div>
        <div class="book-detail-body">
            <div class="book-detail-image">
                <img src="{{ $book->Image }}" alt="{{ $book->Title }}" class="img-fluid rounded shadow-sm mx-auto d-block">
            </div>
            <div class="book-detail-info">
                @if($book->Author)
                    <p><strong>Auteur:</strong> {{ $book->Author }}</p>
                @endif
                @if($book->Publisher)
                    <p><strong>Éditeur:</strong> {{ $book->Publisher }}</p>
                @endif
                @if($book->Year)
                    <p><strong>Année:</strong> {{ $book->Year }}</p>
                @endif
                @if($book->Genre)
                    <p><strong>Genre:</strong> {{ $book->Genre }}</p>
                @endif
                @if($book->Status)
                    <p><strong>Statut:</strong> {{ $book->Status }}</p>
                @endif
                @if($book->Language)
                    <p><strong>Langue:</strong> {{ $book->Language }}</p>
                @endif
                @if($book->Pages)
                    <p><strong>Pages:</strong> {{ $book->Pages }}</p>
                @endif
                @if($book->Description)
                    <p><strong>Description:</strong> {{ $book->Description }}</p>
                @endif
                @if($book->Views)
                    <p><strong>Vues:</strong> {{ $book->Views }}</p>
                @endif
                @if($book->Likes)
                    <p><strong>Aime:</strong> {{ $book->Likes }}</p>
                @endif
                @if($book->Library)
                    <p><strong>Bibliothèque:</strong> {{ $book->Library }}</p>
                @endif
            </div>
        </div>
        <div class="w-1/3">
            <!-- Books that may also interest you -->
            <h2 class="text-xl font-bold mb-4">Books that may also interest you</h2>
            <ul>
                @foreach($randomBooks as $randomBook)
                    <li class="mb-2">
                        <a href="{{ route('books.show', $randomBook->id) }}" class="text-blue-500 hover:underline">
                            {{ $randomBook->Title }} by {{ $randomBook->Author }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Comment Section -->
        <div class="comment-section mt-8">

            @auth
            <h2 class="text-xl font-bold mb-4">Leave a Comment</h2>
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <textarea name="comment" rows="4" class="w-full p-2 border rounded" placeholder="Write your comment here..."></textarea>
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
            </form>
            @endauth
            <h2 class="text-xl font-bold mb-4">Comments</h2>
            @if($comments->isEmpty())
                <p>No comment for this book, be the first!</p>
            @else
                @foreach($comments as $comment)
                    <div class="mb-4 p-4 border rounded">
                        <p><strong>{{ $comment->username }}</strong> said:</p>
                        <p>{{ $comment->comment }}</p>
                        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-layout>