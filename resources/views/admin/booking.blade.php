@extends('layouts.admin_home')

@section('content')
<div class="container-fluid">
    <h1>Facilities</h1>
    <button class="btn btn-primary mb-3" id="addFacilityBtn">Add Facility</button>
    <div id="addFacilityForm" style="display: none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeForm('addFacilityForm')">
            <i class="uil uil-times icon"></i>
        </button>
        <h2>Add Facility</h2>
        <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="mb-3">
                <label for="cost" class="form-label">Cost</label>
                <input type="number" class="form-control" id="cost" name="cost" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <hr>
    </div>

    

    @foreach ($facilities as $facility)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $facility->f_name }}</h5>
                <img src="{{ asset('image/icons/facility/'.$facility->img) }}" alt="{{ $facility->name }}" class="img-fluid mb-3" style="max-height: 200px">
                <p class="card-text"><strong>Cost:</strong> RM {{ $facility->cost }}</p>
                <p class="card-text"><strong>Availability:</strong> {{ $facility->availability ? 'Available' : 'Not Available' }}</p>
                <h6 class="card-subtitle mb-2 text-muted">Bookings:</h6>
                <ul>
                    @forelse ($facility->booking as $booking)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $booking->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $booking->studentid }}</h6>
                            <p class="card-text">Session Time: {{ $booking->session->time }}</p>
                            @if ($facility->id == 6)
                                <p class="card-text">Room: {{ $booking->session->rooms }}</p>
                            @endif
                        </div>
                    </div>
                    @empty
                        <div class = "card">
                            <div class = "card-body">
                                <h5 class = "card-title">No bookings</h5>
                            </div>
                        </div>
                    @endforelse
                </ul>
                <button class="btn btn-primary editFacilityBtn" data-facility-id="{{ $facility->id }}">Edit</button>
                <!-- Add delete button if needed -->
                <div id="editFacilityForm_{{ $facility->id }}" style="display: none;">
                <hr>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeForm('editFacilityForm_{{ $facility->id }}')">
                        <i class="uil uil-times icon"></i>
                    </button>
                    <h3>Edit Facility</h3>
                    <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $facility->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="cost" class="form-label">Cost</label>
                            <input type="number" class="form-control" id="cost" name="cost" step="0.01" value="{{ $facility->cost }}" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="availability" name="availability" value="1" {{ $facility->availability ? 'checked' : '' }}>
                            <label class="form-check-label" for="availability">Available</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        document.getElementById('addFacilityBtn').addEventListener('click', function() {
            document.getElementById('addFacilityForm').style.display = 'block';
        });

        const editBtns = document.querySelectorAll('.editFacilityBtn');
        editBtns.forEach((editBtn) => {
            const facilityId = editBtn.dataset.facilityId;
            const editFacilityForm = document.getElementById(`editFacilityForm_${facilityId}`);
            editBtn.addEventListener('click', () => {
                editFacilityForm.style.display = 'block';
            });
        });

        function closeForm(formId) {
            document.getElementById(formId).style.display = 'none';
        }
    </script>
</div>
@endsection

@section('styles')
<style>
    .close{
        font-size: 20px;
        color: black;
        background: none;
        border: none;
        padding: 0;
        margin: 0;
        line-height: 1;
        position: absolute;
        right: 20px;
        bottom: 1;
    }

    .close:hover {
        border: 1px solid #DEDEDE;
    }

</style>

@endsection