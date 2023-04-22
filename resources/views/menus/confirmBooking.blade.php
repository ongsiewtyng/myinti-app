@extends('menus.service3')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: rgba(0, 0, 0, 0.5);">
    <div class="container bg-white p-4 rounded">
        <h3 class="text-center mb-4">Confirm Booking?</h3>
        <div class="row mb-3">
            <div class="col-6">{{ $session->f_id }}</div>
            <div class="col-6 text-right">{{ $startTime }} - {{ $endTime }}</div>
        </div>
        <form method="POST" action="{{ route('bookings.store') }}">
            @csrf
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" name="student_id" id="student_id" class="form-control" required>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary mr-3">Yes</button>
                <a href="{{ route('bookings.index') }}" class="btn btn-secondary">No</a>
            </div>
        </form>
    </div>
</div>

@endsection

@section('styles')

