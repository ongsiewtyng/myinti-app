@extends('layouts.admin_home')

@section('content')
    <div class="search-overlay">
        <h1>Search Results</h1>

        <div id="searchResultsContainer" class="overlay-content">
            @if ($results->isEmpty())
                <p>No results found.</p>
            @else
                <ul>
                    @foreach ($results as $result)
                        <li>{{ $result->name }} - {{ $result->email }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function search() {
            // Get the search term from the input field
            var searchTerm = document.getElementById("searchInput").value;

            // Make an AJAX request to the search route with the search term
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "{{ route('admin.search') }}?term=" + searchTerm, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Handle the response and update the search results
                    var results = JSON.parse(xhr.responseText);
                    updateSearchResults(results);

                    // Display the search results overlay
                    var searchResultsContainer = document.getElementById('searchResultsContainer');
                    searchResultsContainer.classList.add('active');
                }
            };
            xhr.send();
        }

        function updateSearchResults(results) {
            // Get the container where the search results will be displayed
            var searchResultsContainer = document.getElementById("searchResultsContainer");
            console.log(results);

            // Clear the existing search results
            searchResultsContainer.innerHTML = "";

            // Display the search results
            if (results.length > 0) {
                var ul = document.createElement("ul");
                results.forEach(function (result) {
                    var li = document.createElement("li");
                    li.textContent = result.name;
                    ul.appendChild(li);
                });
                searchResultsContainer.appendChild(ul);
            } else {
                var p = document.createElement("p");
                p.textContent = "No results found.";
                searchResultsContainer.appendChild(p);
            }
        }

        // Attach event listener to the search input
        document.getElementById("searchInput").addEventListener("keyup", search);
    </script>
@endsection
