@extends('layouts.admin_home')

@section('content')
    <div class="container">
        <h1>Approval List</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="urgency">Filter by Urgency:</label>
                    <select class="form-control" id="urgency" name="urgency">
                        <option value="">All</option>
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
                        <tr>
                            <td>{{ $submission->id }}</td>
                            <td>{{ $submission->user->name }}</td>
                            <td>{{ $submission->urgency }}</td>
                            <td>
                            @if ($submission->status == 'pending')
                                <span class="badge badge-warning" style="color: red">Pending</span>
                            @else
                                <span class="badge badge-success" style="color: green">Approved</span>
                            @endif
                            </td>
                            <td>
                            <a href="{{ route('approval.toggle', ['id' => $submission->id]) }}" class="btn btn-primary">Toggle Approval</a>
                            <a href="{{ route('approval.download', ['id' => $submission->id]) }}" class="btn btn-secondary">Download File</a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            // Handle urgency filter change
            $('#urgency').change(function() {
                var urgency = $(this).val();

                // Hide/show approval items based on urgency filter
                if (urgency === '') {
                    $('.approval-item').show();
                } else {
                    $('.approval-item').hide();
                    $('.approval-item[data-urgency="' + urgency + '"]').show();
                }
            });
        });
    </script>
@endsection

@section('styles')
<style>

</style>

@endsection