@extends('layouts.main')

@section('content')
<head>
    <div class="header">
        <h1>Message Us</h1>
        <div class="line"></div>
    </div>
</head>
<body>
    <div class="paragraph">
        <p>New Service? Complaint? Bug? Feedback?</p>
        <p>Please fill in the form and let us know your concern about the site.We'll get back to you as soon as possible.</p>
    </div>
    <div class="form">
    <form action="/submit-proposal" method="post">
        @csrf <!-- add CSRF token for security -->
        <label for="name" style="font-size: 20px; font-weight: bold;">Name:</label><br>
        <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; border-radius: 5px; border: none;"><br><br>
        <label for="email" style="font-size: 20px; font-weight: bold;">Email:</label><br>
        <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border-radius: 5px; border: none;"><br><br>
        <label for="subject" style="font-size: 20px; font-weight: bold;">What is your message about?</label><br>
        <select id="subject" name="subject" style="width: 100%; padding: 10px; border-radius: 5px; border: none;">
            <option value="New service in college">New service in college</option>
            <option value="Complaint">Complaint</option>
            <option value="Bug">Bug</option>
            <option value="Feedback">Feedback</option>
        </select><br><br>
        <label for="message" style="font-size: 20px; font-weight: bold;">Describe your message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required style="width: 100%; padding: 10px; border-radius: 5px; border: none;"></textarea><br><br>
        <button type="submit" class="btn btn-primary" style="background: #5E5BFF; border-radius: 5px; border: none;">Submit</button>
  </form>
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
</style>
