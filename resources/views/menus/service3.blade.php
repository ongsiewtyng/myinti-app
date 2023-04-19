@extends('layouts.main')

@section('content')
<div class="container">
    <div class="table-container">
        <h2 class="table-header">Sessions Available</h2>
        <div class="table">
            <div class="fname">
                Facility Name
            </div>
            <div class="time">
                Time
            </div>
        </div>
        @foreach($facilities as $facility)
            @if(isset($grouped_sessions[$facility->f_id]))
                <div class="table">
                    <div class="gname">
                        {{ $facility->name }}
                    </div>
                    <div class="g_id">
                        <img src="{{ $facility->icon_url }}" alt="Facility Icon" class="facility-icon">
                        {{ $facility->f_id }}
                    </div>
                    <div class="gtime">
                        <div class="time-select-container">
                            <select name="time" class="time-select">
                                @foreach($grouped_sessions[$facility->f_id] as $session)
                                    <option value="{{ $session->time }}">{{ $session->time }}</option>
                                @endforeach
                            </select>
                            <form method="POST" action="/book-session">
                                @csrf
                                <input type="hidden" name="f_id" value="{{ $facility->f_id }}">
                                <input type="hidden" name="time" value="{{ $session->time }}">
                                <button type="submit" class="book-now-btn">Book Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<div class="container">
    <div class="table-container">
        <h2 class="table-header">Sessions Booked</h2>
            <div class="table">
                <div class="fname">
                    Facility Name
                </div>
                <div class="time">
                    Time
                </div>
                <div class="student">
                    Student ID
                </div>
            </div>
            @foreach($booked_sessions as $session)
            <div class="table">
                <div class="column">
                    {{$facilities[$session->f_id]}}
                </div>
                <div class="column">
                    <img src="{{ $facilities[$session->f_id]->image }}" alt="Facility Image" class="facility-image">
                    {{$session->f_id}}
                </div>
                <div class="column">
                    {{$session->time}}
                </div>
                <div class="column">
                    {{$session->studentid}}
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

@section('styles')
<style>

    .table-container {
        width: auto;
        margin: 40px 0;
        
    }

    .table-header {
        text-align: center;
        margin-bottom: 10px;
    }

    .table {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border: 1px solid black;
        border-radius: 10px;
    }

    .fname {
        flex: 0.45;
        text-align: center;
        padding: 5px;
        font-weight: bold;
    }

    .time {
        flex: 0.5;
        padding: 5px;
        font-weight: bold;
    }

    .student {
        flex: 1;
        text-align: right;
        padding: 5px;
        font-weight: bold;
    }

    form {
        display: flex;
        justify-content: center;
    }

    .gname {
        flex: 1;
        text-align: center;
        padding: 5px;
        font-weight: bold;
        display:inline-block;
    }

    .gtime {
        flex: 1.3;
        text-align: center;
        padding: 5px;
    }

    .time-select-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 10px;
        overflow: hidden;
    }

    .time-select {
        padding: 5px;
        border: none;
        background-color: transparent;
    }

    .book-now-btn {
        margin-left: 100px;
        padding: 5px 20px;
        border-radius: 5px;
        background-color: #fff;
        color: #000000;
        border: 1px solid black;
        transition: all 0.3s ease;
    }

    .book-now-btn:hover {
        background-color: #FF3131;
        color: #fff;
        font-weight: bold;
    }


    


</style>
@endsection