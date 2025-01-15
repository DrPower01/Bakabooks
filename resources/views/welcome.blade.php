<!-- filepath: /home/drpower/Documents/BakaBooks/resources/views/welcome.blade.php -->
<!DOCTYPE html>
<x-layout>
    <head>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    </head>
    <style>
        body {
            background-color: #343a40; /* Laravel dark color */
        }
        h2 {
            font-size: 2.5rem; /* Increase font size */
            color: lightblue; /* Change text color to lightblue */
        }
        .carousel-item img {
            margin: 0 auto;
            width: 40%; 
            max-width: 300px; /* Set maximum width */
            height: auto; /* Maintain the aspect ratio */
            padding-top: 20px; /* Add upper padding */
        }
        .carousel-item {
            display: none;
            text-align: center;
        }
        .carousel-item.active {
            display: block;
        }
        .carousel-caption {
            text-align: bottom;
        }
         .book-tags {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }
        .book-tags span {
            color: lightblue;
        }
        .book-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: center; /* Center the book title */
        }
        .scrollable-list {
            display: flex;
            overflow-x: auto;
            padding: 1rem 0;
            height: auto;
        }
        .book-container {
            flex: 0 0 auto;
            width: 150px; /* Fixed width for all book containers */
            height: 350px; /* Fixed height for all book containers */
            margin-right: 1rem;
            text-align: center;
        }
        .book-container img {
            width: 100%;
            height: 200px; /* Fixed height for all book images */
            object-fit: cover; /* Ensure the image covers the entire area */
        }
        .book-title {
            font-size: 1rem;
            margin: 0.5rem 0;
        }
    </style>
    <div id="bookCarousel" class="carousel slide bg-dark" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            @foreach($slideshowBooks as $book)
                <div class="carousel-item @if($loop->first) active @endif">
                    <a href="{{ route('books.show', $book->id) }}">
                        <img src="{{ $book->Image }}" class="d-block w-75 img-fluid" alt="{{ $book->Title }}">
                    </a>                    
                    <div class="carousel-caption d-none d-md-block mt-3">
                        <strong><h4 class="book-title" style="color: lightblue;" title="{{ $book->Title }}">{{ $book->Title }}</h4></strong>
                        <p style="color: lightblue;">{{ $book->Author }}</p>
                        <div class="book-tags">
                            <span><i class="fas fa-eye"></i> {{ $book->Views }}</span>
                            <span><i class="fas fa-thumbs-up"></i> {{ $book->Likes }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <h2 class="mt-5 text-light">Livres les plus vus</h2>
    <div class="scrollable-list bg-dark">
        @foreach($mostViewedBooks as $book)
            <div class="book-container">
                <a href="{{ route('books.show', $book->id) }}">
                    <img src="{{ $book->Image }}" alt="{{ $book->Title }}">
                </a>
                <strong><h4 class="book-title" style="color: lightblue;" title="{{ $book->Title }}">{{ $book->Title }}</h4></strong>
                <p style="color: lightblue;">{{ $book->Author }}</p>
                <div class="book-tags">
                    <span><i class="fas fa-eye"></i> {{ $book->Views }}</span>
                    <span><i class="fas fa-thumbs-up"></i> {{ $book->Likes }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="mt-5 text-light">Livres les plus aimés</h2>
    <div class="scrollable-list bg-dark">
        @foreach($mostLikedBooks as $book)
            <div class="book-container">
                <a href="{{ route('books.show', $book->id) }}">
                    <img src="{{ $book->Image }}" alt="{{ $book->Title }}">
                </a>
                <strong><h4 class="book-title" style="color: lightblue;" title="{{ $book->Title }}">{{ $book->Title }}</h4></strong>
                <p style="color: lightblue;">{{ $book->Author }}</p>
                <div class="book-tags">
                    <span><i class="fas fa-eye"></i> {{ $book->Views }}</span>
                    <span><i class="fas fa-thumbs-up"></i> {{ $book->Likes }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        // JavaScript for the slideshow
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let slides = document.getElementsByClassName("carousel-item");
            for (let i = 0; i < slides.length; i++) {
                slides[i].classList.remove("active");
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            slides[slideIndex - 1].classList.add("active");
            setTimeout(showSlides, 3000); // Change image every 3 seconds
        }
    </script>
</x-layout>