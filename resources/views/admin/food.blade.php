@extends('layouts.admin_home')

@section('content')
<body>
    <section id="food-menu" class="food-menu">
        <div class="title">
            <i class="uil uil-utensils"></i>
            <span class="text">Food Menu</span>
        </div>
        <div class="add-category">
            <form action="{{ route('add-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="cat" placeholder="Enter category name" required>
                <input type="file" name="pic" placeholder="Choose a picture" required>
                <button type="submit">Add Category</button>
            </form>
        </div>
        <div class="categories">
            <!-- Code to display categories dropdown -->
            <select name="category" id="categorySelect">
                <option value="all">All</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
            <button class="add-food">Add Food Item</button>
        </div>
        <!-- Add food form -->
        <div class="add-food-form" style="display: none;">
            <form action="{{ route('add-food') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="category" placeholder="Enter category">
                <input type="text" name="name" placeholder="Enter food name">
                <input type="file" name="pic" id="pic-input">
                <textarea name="description" placeholder="Enter description"></textarea>
                <input type="text" name="price" placeholder="Enter price">
                <!-- Add additional form fields for other columns in the food table -->
                <button type="submit">Add Food Item</button>
            </form>
        </div>
        <div class="filter">
            <label for="availabilitySelect">
                <i class='bx bx-filter-alt' style='color:#0c0c0c'></i>
                Filter:
            </label>
            <select name="availability" id="availabilitySelect">
                <option value="all">All</option>
                <option value="available">Available</option>
                <option value="unavailable">Unavailable</option>
            </select>
        </div>

        <div class="food-items">
            <!-- Code to display food items -->
            @foreach ($foodItems as $foodItem)
                <div class="food-item" data-category="{{ $foodItem->category }}">
                    @php
                        $defaultCategory = 'cafeSandwiches'; // Default directory

                        $category = $foodItem->category;
                        $categoryDirectory = 'cafe' . str_replace(' ', '', $category);
                        $imagePath = "{$categoryDirectory}/{$foodItem->pic}";

                        $directoryPath = public_path($categoryDirectory);
                        if (!is_dir($directoryPath)) {
                            mkdir($directoryPath, 0777, true);
                        }
                    @endphp
                    <img src="{{ asset($imagePath) }}" alt="{{ $foodItem->name }}">
                    <div class="info">
                        <h3>{{ $foodItem->name }}</h3>
                        <p>{{ $foodItem->description }}</p>
                        <span class="price">RM {{ $foodItem->price }}</span>
                    </div>
                    <div class="availability">
                        <span class="status {{ $foodItem->available ? 'available' : 'unavailable' }}">
                            {{ $foodItem->available ? 'Available' : 'Unavailable' }}
                        </span>
                        <button class="toggle-availability" onclick="toggleAvailability(event)" data-food-id="{{ $foodItem->id }}">
                            Toggle Availability
                        </button>
                        <button class="edit-food" data-id="{{ $foodItem->id }}">Edit</button>
                    </div>

                    <!-- Edit form -->
                    <form class="edit-form" action="{{ route('food.update', $foodItem->id) }}" method="POST" enctype="multipart/form-data" style="display: none;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $foodItem->id }}">
                        <input type="text" name="name" value="{{ $foodItem->name }}">
                        <textarea name="description">{{ $foodItem->description }}</textarea>
                        <input type="text" name="price" value="{{ $foodItem->price }}">
                        <input type="text" name="category" value="{{ $foodItem->category }}">
                        <input type="file" name="pic" id="pic-input" value="{{ $foodItem->pic }}">
                        <!-- Add additional form fields for other columns in the food table -->
                        <div class="form-buttons">
                            <button type="submit">Update</button>
                            <button type="button" class="cancel-button">Cancel</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>

    </section>
</body>
<script>
    // Event handler for when the category dropdown value changes
    $('#categorySelect').on('change', function() {
    var selectedCategory = $(this).val(); // Get the selected category value

    // Set the value of the category input field in the add-food form
    $('input[name="category"]').val(selectedCategory);
    });
    
    document.addEventListener("DOMContentLoaded", function() {
        const categorySelect = document.getElementById('categorySelect');

        categorySelect.addEventListener('change', function() {
            const selectedCategory = categorySelect.value;
            const foodItems = document.querySelectorAll('.food-item');

            foodItems.forEach(function(foodItem) {
                const category = foodItem.getAttribute('data-category');
                if (selectedCategory === 'all' || category === selectedCategory) {
                    foodItem.style.display = 'block';
                } else {
                    foodItem.style.display = 'none';
                }
            });
        });
    });
        document.addEventListener('DOMContentLoaded', function() {
            const addButton = document.querySelector('.add-food');
            const addFoodForm = document.querySelector('.add-food-form');

        addButton.addEventListener('click', function() {
            addFoodForm.style.display = 'block';
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const editButtons = document.querySelectorAll('.edit-food');

        editButtons.forEach(function(editButton) {
            editButton.addEventListener('click', function() {
                const foodItem = editButton.closest('.food-item');
                const editForm = foodItem.querySelector('.edit-form');
                editForm.style.display = 'block';

                // Add event listener to the cancel button within the edit form
                const cancelButton = editForm.querySelector('.cancel-button');
                cancelButton.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent form submission
                    editForm.style.display = 'none';
                });
            });
        });
    });
    
    function toggleAvailability(event) {
        const toggleAvailabilityButton = event.target;
        const foodId = toggleAvailabilityButton.getAttribute('data-food-id');
        const url = `/food/${foodId}/toggle-availability`;

        const statusElement = toggleAvailabilityButton.closest('.availability').querySelector('.status');
        const currentAvailability = statusElement.textContent.trim().toLowerCase();
        const confirmationMessage = currentAvailability === 'available'
            ? 'Are you sure you want to mark the food as unavailable?'
            : 'Are you sure you want to mark the food as available?';

        if (!confirm(confirmationMessage)) {
            return;
        }

        // Create an XMLHttpRequest object
        const xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        xhr.onload = function() {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                const statusElement = toggleAvailabilityButton.closest('.availability').querySelector('.status');
                statusElement.textContent = data.available ? 'Available' : 'Unavailable';
                statusElement.classList.toggle('available');
                statusElement.classList.toggle('unavailable');
            } else {
                console.error('Toggle availability request failed.');
            }
        };

        xhr.onerror = function() {
            console.error('Error occurred during the toggle availability request.');
        };

        xhr.send();
    }

    document.addEventListener("DOMContentLoaded", function() {
        const availabilitySelect = document.getElementById('availabilitySelect');
        const foodItems = document.querySelectorAll('.food-item');

        availabilitySelect.addEventListener('change', function() {
            const selectedValue = availabilitySelect.value;

            foodItems.forEach(function(foodItem) {
                const availability = foodItem.querySelector('.availability');
                const status = availability.querySelector('.status');

                if (selectedValue === 'all') {
                    foodItem.style.display = 'block';
                } else if (selectedValue === 'available' && status.classList.contains('available')) {
                    foodItem.style.display = 'block';
                } else if (selectedValue === 'unavailable' && status.classList.contains('unavailable')) {
                    foodItem.style.display = 'block';
                } else {
                    foodItem.style.display = 'none';
                }
            });
        });
    });
    

</script>
@endsection

@section('styles')
<style>
    .food-menu {
        position: relative;
        left: 70px;
        background-color: var(--panel-color);
        min-height: 100vh;
        width: calc(100% - 80px);
        padding: 10px 14px;
        transition: var(--tran-05);
    }

    .food-menu .title {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
    }

    .food-menu .title i {
        font-size: 2.5rem;
        margin-right: 1rem;
    }

    .food-menu .title .text {
        font-size: 2rem;
        font-weight: 600;
    }
    .filter {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        margin-right: 10px;
    }

    .filter label {
        display: flex;
        align-items: center;
        font-size: 14px;
        color: #0c0c0c;
        border-radius: 4px;
        padding: 4px 8px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
    }

    .filter i {
        margin-right: 6px;
        font-size: 16px;
    }

    .filter select {
        margin-left: 6px;
        padding: 4px 8px;
        font-size: 14px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .food-menu .add-category,
    .food-menu .categories {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
    }

    .food-menu .add-category input[type="text"],
    .food-menu .add-category input[type="file"],
    .food-menu .categories select {
        padding: 0.5rem 1rem;
        border: 1px solid #ccc;
        border-radius: 0.5rem;
        margin-right: 1rem;
    }

    .food-menu .add-category button,
    .food-menu .categories button {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.5rem;
        background-color: #1abc9c;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
    }

    .food-menu .add-category button:hover,
    .food-menu .categories button:hover {
        background-color: #16a085;
    }

    .food-menu .food-items {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 2rem;
        margin-top:20px;
    }

    .food-menu .food-item {
        position: relative;
        border: 1px solid #ccc;
        border-radius: 0.5rem;
        padding: 1rem;
    }

    .food-menu .food-item .item-name {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .food-menu .food-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }

    .food-menu .food-item .info {
        margin-bottom: 1rem;
    }

    .food-menu .food-item .info h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .food-menu .food-item .info p {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .food-menu .food-item .info .price {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .food-menu .food-item .availability {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
    }

    .food-menu .food-item .availability .text {
        font-size: 1rem;
    }

    .availability {
        display: flex;
        align-items: center;
    }

    .status {
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .available {
        background-color: #68f151;
        color: white;
    }

    .unavailable {
        background-color: red;
        color: white;
    }

    .toggle-availability {
        border: 2px solid #85FF76;
        color: black;
        padding: 8px 16px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    .toggle-availability:hover {
        background-color: #00FF5D;
        color:white;
    }

    .toggle-availability:focus {
        outline: none;
    }

    .toggle-availability:active {
        background-color: #3e8e41;
    }


    button.edit-food {
        background-color: #2196f3;
        color: #fff;
        border: none;
        padding: 8px 16px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 4px;
    }

    button.edit-food:hover {
        background-color: var(--primary-color);
    }

    button.edit-food:active {
        background-color: #DDD;
    }

    .add-food-form,
    .edit-form {
        display: none;
        margin-top: 20px;
    }

    .add-food-form form,
    .edit-form form {
        display: grid;
        gap: 10px;
    }

    .add-food-form input[type="text"],
    .add-food-form textarea,
    .add-food-form button,
    .edit-form input[type="text"],
    .edit-form textarea,
    .edit-form button,
    .edit-form input[type="file"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .add-food-form button,
    .edit-form button {
        background-color: #4caf50;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .add-food-form button:hover,
    .edit-form button:hover {
        background-color: #45a049;
    }

    .edit-form button:active {
        background-color: #3e8e41;
    }

    .edit-form textarea {
        height: 100px;
    }

    .edit-form .form-buttons {
        display: flex;
        gap: 10px;
    }

    .edit-form .cancel-button {
        padding: 10px;
        background-color: #ccc;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .edit-form .cancel-button:hover {
        background-color: red;
    }

    .edit-form .cancel-button:active {
        background-color: #888;
    }

    @media screen and (max-width: 992px),
    screen and (max-width: 768px) {
        .food-menu .food-items {
            grid-template-columns: repeat(2, 1fr);
        }
        .food-menu {
        margin-left: 0; /* Add this line */
        width: 100%; /* Add this line */
    }
    }

    @media screen and (max-width: 576px) {
        .food-menu .food-items {
            grid-template-columns: 1fr;
        }
    }


</style>
@endsection
