@extends('layouts.admin_home')

@section('content')
    <div class="container">
        <h1>Approval List</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="urgency">Filter by Urgency:</label>
                    <select class="form-control" id="urgency" name="urgency">
                        <option value="all">All</option>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Submission ID</th>
                    <th>Name</th>
                    <th>Urgency</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
                <tbody>
                    @if ($submissions->isEmpty())
                        <tr>
                        <td colspan="5">No submissions</td>
                        </tr>
                    @else
                        @foreach ($submissions as $submission)
                            <tr class="submission-row">
                                <td>{{ $submission->id }}</td>
                                <td>{{ $submission->user->name }}</td>
                                <td class = "urgency">{{ $submission->urgency }}</td>
                                <td>
                                @if ($submission->status == 'pending')
                                    <span class="badge badge-warning" style="color: red">Pending</span>
                                @else
                                    <span class="badge badge-success" style="color: green">Approved</span>
                                @endif
                                </td>
                                <td>
                                    @if ($submission->status == 'pending')
                                        <a href="{{ route('approval.toggle', ['id' => $submission->id]) }}" class="btn btn-primary" onclick="return confirm('Are you sure you want to approved?')">Approved</a>
                                    @endif
                                        <a href="{{ route('approval.download', ['id' => $submission->id]) }}" class="btn btn-secondary">Download File</a>
                                </td>
                            </tr>
                            <tr class="info-row" id="info-row-{{ $submission->id }}" style="display: none;">
                                <td colspan="5">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Additional Information</h5>
                                            <h6 class="card-text">Club Name:</h6>
                                            <p class="card-text">{{ $submission->club_name }}</p>
                                            <h6 class="card-text">Event Title:</h6>
                                            <p class="card-text">{{ $submission->event_title }}</p>
                                            <h6 class="card-text">Start Date - End Date:</h6>
                                            <p class="card-text">{{ \Carbon\Carbon::parse($submission->start_date)->format('j F Y') }} - {{ \Carbon\Carbon::parse($submission->end_date)->format('j F Y') }}</p>
                                            <h6 class="card-text">Start Time - End Time:</h6>
                                            <p class="card-text">{{ \Carbon\Carbon::parse($submission->start_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($submission->end_time)->format('g:i A') }}</p>
                                            <!-- Add more fields as needed -->
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
        </table>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urgencySelect = document.getElementById('urgency');
            const infoItems = document.querySelectorAll('.submission-row');

            urgencySelect.addEventListener('change', function() {
                const selectedValue = urgencySelect.value;

                infoItems.forEach(function(infoItem) {
                    const urgency = infoItem.querySelector('.urgency');

                    if (selectedValue === 'all') {
                        infoItem.style.display = 'table-row';
                    } else if (selectedValue === 'high' && urgency.textContent.toLowerCase() === 'high') {
                        infoItem.style.display = 'table-row';
                    } else if (selectedValue === 'medium' && urgency.textContent.toLowerCase() === 'medium') {
                        infoItem.style.display = 'table-row';
                    } else if (selectedValue === 'low' && urgency.textContent.toLowerCase() === 'low') {
                        infoItem.style.display = 'table-row';
                    } else {
                        infoItem.style.display = 'none';
                    }
                });
            });
        });


        // Add event listener to each submission row
        var submissionRows = document.getElementsByClassName("submission-row");
        Array.from(submissionRows).forEach(function(row) {
            row.addEventListener("click", function() {
                // Toggle the display of additional info row
                var additionalInfoRow = row.nextElementSibling;
                additionalInfoRow.style.display = (additionalInfoRow.style.display === "none") ? "table-row" : "none";
            });
        });

        
    </script>

@endsection

@section('styles')
<style>

</style>

@endsection