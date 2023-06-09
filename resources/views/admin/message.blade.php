@extends('layouts.admin_home')

@section('content')
<body>
    <div class="container">
        <h1>Messages</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Reply</th>
                </tr>
            </thead>
            <tbody>
                @if ($messages->isEmpty())
                    <tr>
                    <td colspan="3">No messages</td>
                    </tr>
                @else
                    @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->message }}</td>
                        <td>
                        @if($message->reply)
                            {{ $message->reply }}
                        @else
                            <button class="btn btn-primary reply-btn" data-message-id="{{ $message->id }}">Reply</button>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <!-- Modal for replying to messages -->
    <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">Reply to Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeForm(event)">
                        <i class="uil uil-times icon"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="replyForm" method="POST" action="{{ route('messages.reply') }}">
                        @csrf
                        <input type="hidden" id="messageId" name="message_id">
                        <div class="form-group">
                            <label for="reply">Reply:</label>
                            <textarea class="form-control" id="reply" name="reply" rows="5"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Send Reply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.reply-btn').click(function() {
                var messageId = $(this).data('message-id');
                $('#messageId').val(messageId);
                $('#replyModal').modal('show');
            });
        });

        function closeForm(event) {
            const modal = event.target.closest('.modal');
            if (modal) {
                $(modal).modal('hide');
            }
        }
    </script>
</body>
@endsection

@section('styles')
<style>
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

    textarea#reply {
        padding: 10px;
    }



</style>

@endsection