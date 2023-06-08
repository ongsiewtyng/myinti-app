@extends('layouts.main')

@section('content')
<head>
    <div class="header">
        <h1>Message Us</h1>
        <div class="line"></div>
    </div>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div style="width:fit-content" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="paragraph">
            <p>New Service? Complaint? Bug? Feedback?</p>
            <p>Please fill in the form and let us know your concern about the site. We'll get back to you as soon as possible.</p>
        </div>
        <div class="form">
            <form action="{{ route('contact.submit') }}" method="post">
                @csrf <!-- add CSRF token for security -->
                <div class="form-group mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required value="{{ $name }}">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{ $email }}">
                </div>
                <div class="form-group mb-3">
                    <label for="subject">What is your message about?</label>
                    <select class="form-control" id="subject" name="subject">
                        <option value="New service in college">New service in college</option>
                        <option value="Complaint">Complaint</option>
                        <option value="Bug">Bug</option>
                        <option value="Feedback">Feedback</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="message">Describe your message:</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

@endsection

@section('styles')
<style>
    @import url('https://fonts.cdnfonts.com/css/kopi-senja-sans');
    .header {
        font-family: 'Kopi Senja Sans', sans-serif;
        color: #000000;
        padding: 20px;
    }

    h1 {
        position: absolute;
        width: 262px;
        height: 64px;
        left: 150px;
        top: 262px;
        font-size: 48px;
        line-height: 64px;
        /* identical to box height */

        text-align: center;
        letter-spacing: 0.04em;

    }

    .line {
        position: absolute;
        width: 200px;
        height: 0px;
        left: 192px;
        top: 310px;

        border: 2px solid #FF0000;
    }

    .paragraph{
        position: absolute;
        width: 290px;
        height: 353px;
        left: 191px;
        top: 320px;

        font-family: 'Anuphan';
        font-size: 20px;
        line-height: 35px;
        letter-spacing: 0.04em;
    }

    .form {
        position: absolute;
        width: 700px;
        height: auto;
        left: 700px;
        top: 190px;
        background-color: #FCF275;
        padding: 20px;
        border-radius: 10px;
        font-family: 'Anuphan', sans-serif;
    }

    input, select, textarea {
        font-family: 'Anuphan', sans-serif;
    }
    
    /* Responsive styles */
    @media (max-width: 768px) {
        .container {
            padding: 10px;
        }

        .form {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }
    }

</style>
