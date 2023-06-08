@extends('menus.service3')

@section('content')
<h2>Book Facility: {{ $facility->name }}</h2>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form method="POST" action="{{ route('facilities.book') }}">
    @csrf
    <input type="hidden" name="facility_id" value="{{ $facility->id }}">
    <div>
        <label for="start_time">Start Time:</label>
        <input type="text" name="start_time" id="start_time" required>
    </div>
    <div>
        <label for="end_time">End Time:</label>
        <input type="text" name="end_time" id="end_time" required>
    </div>
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>
    <button type="submit">Confirm Booking</button>
</form>

@endsection

@section('styles')

