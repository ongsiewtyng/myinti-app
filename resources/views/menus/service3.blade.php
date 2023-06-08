@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Facility Booking</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Facility</th>
                <th>Available Times</th>
                <th>Book Now</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facilities as $facility)
                <tr>
                    <td>
                        <div class="text-center facility-info">
                            <img src="{{ asset('image/icons/facility/'.$facility->img) }}" alt="{{ $facility->f_name }}" width="70">
                            <div class="facility-name">{{ $facility->f_name }}</div>
                        </div>
                    </td>
                    <td class="text-center">
                        @if($facility->id == 6)
                            <select class="form-control">
                                @foreach($facility->sessions->where('f_id', 6)->pluck('rooms')->unique() as $room)
                                    @php
                                        $session = $facility->sessions->where('rooms', $room)->first();
                                    @endphp
                                    @if(!$session->booked)
                                        <option value="{{ $room }}">{{ $room }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <select id="time-select" class="form-control">
                            <option disabled selected>Select Time</option>
                                @php
                                    $timeOptions = $facility->sessions->where('f_id', 6)->pluck('time')->unique();
                                    $currentTime = \Carbon\Carbon::now();
                                @endphp
                                @foreach($timeOptions as $time)
                                    @php
                                        $timePattern = '/(\d{1,2}):(\d{2}) (AM|PM) - (\d{1,2}):(\d{2}) (AM|PM)/';
                                        $currentTime = \Carbon\Carbon::now();
                                        preg_match($timePattern, $time, $matches);

                                        $startHour = (int)$matches[1];
                                        $endHour = (int)$matches[4];

                                        if ($matches[3] === 'PM' && $startHour !== 12) {
                                            $startHour += 12;
                                        }
                                        if ($matches[6] === 'PM' && $endHour !== 12) {
                                            $endHour += 12;
                                        }

                                        $sessionStartTime = \Carbon\Carbon::createFromTime($startHour, 0);
                                        $sessionEndTime = \Carbon\Carbon::createFromTime($endHour, 0);

                                        $isSessionAvailable = !$session->booked && $sessionStartTime->greaterThan($currentTime) && $sessionEndTime->greaterThan($currentTime);
                                    @endphp
                                    @if($isSessionAvailable)
                                        <option value="{{ $time }}">{{ $time }}</option>
                                    @else
                                        <option value="{{ $time }}" disabled>{{ $time }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @else
                            <select id="time-select" class="form-control">
                                <option disabled selected>Select Time</option>
                                @foreach($facility->sessions as $session)
                                    @php
                                        $timePattern = '/(\d{1,2}):(\d{2}) (AM|PM) - (\d{1,2}):(\d{2}) (AM|PM)/';
                                        $currentTime = \Carbon\Carbon::now();
                                        preg_match($timePattern, $session->time, $matches);

                                        $startHour = (int)$matches[1];
                                        $endHour = (int)$matches[4];

                                        if ($matches[3] === 'PM' && $startHour !== 12) {
                                            $startHour += 12;
                                        }
                                        if ($matches[6] === 'PM' && $endHour !== 12) {
                                            $endHour += 12;
                                        }

                                        $sessionStartTime = \Carbon\Carbon::createFromTime($startHour, 0);
                                        $sessionEndTime = \Carbon\Carbon::createFromTime($endHour, 0);

                                        $isSessionAvailable = !$session->booked && $sessionStartTime->greaterThan($currentTime) && $sessionEndTime->greaterThan($currentTime);
                                    @endphp
                                    @if($isSessionAvailable)
                                        <option value="{{ $session->time }}">{{ $session->time }}</option>
                                    @else
                                        <option value="{{ $session->time }}" disabled>{{ $session->time }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                    </td>
                    <td>
                        @if($isSessionAvailable)
                            <button id="book-now-btn" class="btn btn-primary">Book Now</button>
                        @else
                            <button id="book-now-btn" class="btn btn-primary" disabled>Unavailable</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal for booking facility -->
<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Existing modal content -->
            <div class="modal-body">
                <form id="bookingForm" method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    <input type="hidden" id="facilityId" name="facility_id" value="{{ $facility->id }}">
                    <input type="hidden" id="sessionID" name="session_id">
                    <div class="form-group">
                        <label for="facilityName">Facility Name:</label>
                        <input type="text" class="form-control" id="facilityName" name="name" value="{{ $facility->f_name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="timeslot">Timeslot:</label>
                        <select class="form-control" id="timeslotDropdown" name="time">
                            <!-- Timeslot options will be dynamically populated -->
                        </select>
                    </div>
                    <div id="roomsDurationSection" style="display: none;">
                        <div class="form-group">
                            <label for="rooms">Rooms:</label>
                            <select class="form-control" id="roomsDropdown" name="room">
                                <!-- Room options will be dynamically populated -->
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="studentName">Student Name:</label>
                        <input type="text" class="form-control" id="studentName" name="name" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="studentId">Student ID:</label>
                        <input type="text" class="form-control" id="studentId" name="studentid" value="{{ Auth::user()->studentid }}" readonly>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Confirm Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    

<script>
    $(document).ready(function() {
        // Handle room selection
        $('.modal-body').on('click', '.room-option', function(e) {
            e.preventDefault();
            var selectedRoom = $(this).data('room');
            $('#roomsDropdown').val(selectedRoom);
        });

        // Handle timeslot selection
        $('.modal-body').on('change', '#timeslotDropdown', function() {
            var selectedTime = $(this).val();
            var facilityId = $('#facilityId').val();
            var url = '{{ route('get-session-id') }}'; // Replace with the actual route for retrieving the session ID

            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    facility_id: facilityId,
                    time: selectedTime
                },
                success: function(response) {
                    if (response.success) {
                        $('#sessionID').val(response.session_id);
                        $('#room').val(response.room);
                    } else {
                        console.log('Unable to retrieve session ID.');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJA    X request error:', error);
                }
            });
        });

        $('.book-btn').click(function() {
            var facilityId = $(this).data('facility-id');
            var facilityName = $(this).closest('tr').find('.facility-name').text();
            var timeslotDropdown = $(this).closest('tr').find('select').eq(1).clone();
            var roomDropdown = $(this).closest('tr').find('select').eq(0).clone();


            // Get the selected timeslot
            var selectedTimeslotDropdown = $(this).closest('tr').find('select').eq(1);
            var selectedTimeslot = selectedTimeslotDropdown.val();

            // Get the selected room
            var selectedRoomDropdown = $(this).closest('tr').find('select').eq(0);
            var selectedRoom = selectedRoomDropdown.val();

            $('#facilityId').val(facilityId);
            $('#facilityName').val(facilityName).prop('readonly', true); // Set facility name as read-only

            // Empty the dropdown and append the timeslot options
            var dropdown = $('#timeslotDropdown');
            dropdown.empty().append(timeslotDropdown.html());

            // Set the selected timeslot in the dropdown
            dropdown.val(selectedTimeslot);

            if (facilityId === 6 || facilityId === 7) {
                // Show the rooms and duration section
                $('#roomsDurationSection').show();

                var roomOptionDropdown = $('#roomsDropdown');
                roomOptionDropdown.empty().append(roomDropdown.html());

                var timeOptionDropdown = $('#timeslotDropdown');
                timeOptionDropdown.empty().append(timeslotDropdown.html());

                // Set the selected room in the dropdown
                roomOptionDropdown.val(selectedRoom);
                roomOptionDropdown.trigger('change'); // Trigger change event to update the session ID

                // Set the selected timeslot in the dropdown
                timeOptionDropdown.val(selectedTimeslot);
                timeOptionDropdown.trigger('change'); // Trigger change event to update the session ID
            } else {
                // Hide the rooms and duration section
                $('#roomsDurationSection').hide();

                var timeslotDropdown = $(this).closest('tr').find('select').eq(0).clone();
                var selectedTime = $(this).closest('tr').find('select').eq(0).val();
                timeslotDropdown.val(selectedTime);

                var dropdown = $('#timeslotDropdown');
                dropdown.empty().append(timeslotDropdown.html());
                dropdown.val(selectedTime);
                dropdown.trigger('change'); // Trigger change event to update the session ID
            }

            // Set the student ID and student name
            $('#studentId').val('{{ strtoupper(Auth::user()->studentid) }}');
            $('#studentName').val('{{ Auth::user()->name }}');

            $('#bookingModal').modal('show');
        });
    });

    function closeForm(event) {
        const modal = event.target.closest('.modal');
        if (modal) {
            $(modal).modal('hide');
        }
    }
</script>

@endsection

@section('styles')
<style>
    .facility-info {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .facility-info img {
        margin-bottom: 5px;
        transition: transform 0.3s ease;
    }

    .facility-info img:hover {
        transform: scale(1.2);
    }

    .facility-name {
        font-size: 14px;
        font-weight: bold;
        text-align: center;
    }

    .time-dropdown {
        display: flex;
        justify-content: center;
    }

    .icon {
        font-size: 20px;
        color: black;
        background: none;
        border: none;
        padding: 0;
        margin: 0;
        line-height: 1;
        /* Add any other styles you want */
    }

    .icon:hover {
        color: #ff0000;
    }

    .close{
        font-size: 20px;
        color: black;
        background: none;
        border: none;
        padding: 0;
        margin: 0;
        line-height: 1;
    }

    .close:hover {
        border: 1px solid #DEDEDE;
    }

</style>
@endsection