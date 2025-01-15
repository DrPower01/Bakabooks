<!-- File: resources/views/books/display.blade.php -->

<x-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Books</h1>

        <!-- Sorting and Pagination Controls -->
        <div class="flex justify-between items-center mb-4">
            <div>
                <label for="sort" class="mr-2">Sort by:</label>
                <select id="sort" name="sort" onchange="updateSort()">
                    <option value="Title" {{ $sortField == 'Title' ? 'selected' : '' }}>Title</option>
                    <option value="Author" {{ $sortField == 'Author' ? 'selected' : '' }}>Author</option>
                </select>
                <select id="order" name="order" onchange="updateSort()">
                    <option value="asc" {{ $sortOrder == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ $sortOrder == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </div>
            <div>
                <label for="per_page" class="mr-2">Items per page:</label>
                <select id="per_page" name="per_page" onchange="updatePerPage()">
                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                    <option value="40" {{ $perPage == 40 ? 'selected' : '' }}>40</option>
                    <option value="80" {{ $perPage == 80 ? 'selected' : '' }}>80</option>
                </select>
            </div>
        </div>

        <!-- Books Table -->
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Title</th>
                    <th class="py-2">Author</th>
                    <th class="py-2">Publisher</th>
                    <th class="py-2">Year</th>
                    <th class="py-2">Genre</th>
                    <th class="py-2">Status</th>
                    <th class="py-2">Language</th>
                    <th class="py-2">Pages</th>
                    <th class="py-2">Quantity</th>
                    <th class="py-2">Views</th>
                    <th class="py-2">Likes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td class="py-2">{{ $book->Title }}</td>
                        <td class="py-2">{{ $book->Author }}</td>
                        <td class="py-2">{{ $book->Publisher }}</td>
                        <td class="py-2">{{ $book->Year }}</td>
                        <td class="py-2">{{ $book->Genre }}</td>
                        <td class="py-2">{{ $book->Status }}</td>
                        <td class="py-2">{{ $book->Language }}</td>
                        <td class="py-2">{{ $book->Pages }}</td>
                        <td class="py-2">{{ $book->Quantity }}</td>
                        <td class="py-2">{{ $book->Views }}</td>
                        <td class="py-2">{{ $book->Likes }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $books->appends(['sort' => $sortField, 'order' => $sortOrder, 'per_page' => $perPage])->links() }}
        </div>
    </div>

    <script>
        function updateSort() {
            const sort = document.getElementById('sort').value;
            const order = document.getElementById('order').value;
            const perPage = document.getElementById('per_page').value;
            window.location.href = `?sort=${sort}&order=${order}&per_page=${perPage}`;
        }

        function updatePerPage() {
            const sort = document.getElementById('sort').value;
            const order = document.getElementById('order').value;
            const perPage = document.getElementById('per_page').value;
            window.location.href = `?sort=${sort}&order=${order}&per_page=${perPage}`;
        }
    </script>
</x-layout>