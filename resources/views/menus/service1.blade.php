@extends('layouts.main')

@section('content')
<body>
    <div class="header">
        <h1>Host Your Dream Event on Campus</h1>
        <div class="line"></div>
    </div>
    <div class="container">
        <p>If you're looking to host an event on campus, you're in the right place. Our platform provides a comprehensive event proposal system that streamlines the process of getting your event approved by the university.</p>
        <p2>Fill out the form below to submit your event proposal and take the first step towards hosting your dream event on campus!</p2>
    </div>
    <div class = "img1">
        <img src = "{{ asset('image/pic1.png') }}">
    </div>
    <div class = "img2">
        <img src = "{{ asset('image/pic2.png') }}">
    </div>
    <div class="form">
        <form action="/submit-proposal" method="post">
            @csrf <!-- add CSRF token for security -->
            <div id="hidden-form" style="display: none;">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="hidden" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="student-id">Student ID:</label>
                    <input type="hidden" class="form-control" id="student-id" name="student_id" value="{{ $user->studentid }}">
                </div>
            </div>
            <div class="form-group">
                <label for="club-name">Club Name:</label>
                <input type="text" class="form-control" id="club-name" name="club_name" required>
            </div>
            <div class="form-group">
                <label for="event-title">Event Title:</label>
                <input type="text" class="form-control" id="event-title" name="event_title" required>
            </div>
            <div class="form-group">
                <label for="date-time">Date and Time:</label>
                <input type="datetime-local" class="form-control" id="date-time" name="date_time" required>
            </div>
            <div class="form-group">
                <label for="urgency">How urgent do you need this event to be approved?</label>
                <select class="form-control" id="urgency" name="urgency" required>
                <option value="">Select urgency</option>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
                </select>
            </div>
            <div class="form-group">
                <label for="document">Attach Document:</label>
                <label class="document-container" for="document">
                    <ion-icon name="document-outline" id="logo" alt="Attach Document" style="cursor:pointer;"></ion-icon>
                    <span id="document-label">Select files</span>
                    <input type="file" class="form-control" id="document" name="document[]" style="display: none;" multiple required>
                </label>
                <div id="file-preview"></div>
            </div>
            <button type="submit" class="btn btn-primary" id="submit-button" style = "background: #5E5BFF">Submit Proposal</button>
        </form>
    </div>
    <script>
        const input = document.getElementById('document');
        const label = document.getElementById('document-label');
        const filePreview = document.getElementById('file-preview');
        const submitButton = document.getElementById('submit-button');

        const addedFiles = new Set(); // Set to store the filenames of added files

        input.addEventListener('change', () => {
        if (input.files.length > 0) {
            label.textContent = `${input.files.length} files selected`;

            const initialMarginValue = parseInt(submitButton.style.marginTop || '0');
            let marginValue = initialMarginValue;

            // Loop through selected files and create file previews
            for (let i = 0; i < input.files.length; i++) {
                const file = input.files[i];

                // Check if the file has already been added
                if (addedFiles.has(file.name)) {
                    continue; // Skip the iteration for duplicate files
                }

                const filePreviewItem = document.createElement('div');
                filePreviewItem.classList.add('file-preview-item'); // Add the CSS class to the preview item

                // Create the file logo element
                const fileLogo = document.createElement('ion-icon');
                fileLogo.setAttribute('name', 'document-outline');
                fileLogo.setAttribute('class', 'file-logo');
                filePreviewItem.appendChild(fileLogo);

                // Create the file name element
                const fileName = document.createElement('span');
                fileName.style.height = '10px';
                fileName.textContent = file.name;
                filePreviewItem.appendChild(fileName);

                filePreview.appendChild(filePreviewItem);

                // Increase the margin value for each additional file
                marginValue += 30; // Adjust the value as needed

                // Add the filename to the set of added files
                addedFiles.add(file.name);
                }

                // Set the updated margin value
                submitButton.style.marginTop = `${marginValue}px`;
            } else {
                label.textContent = 'Select files';
                submitButton.style.marginTop = '0';
            }
        });

    </script>

</body>
@endsection


@section('styles')
<style>
    @import url('https://fonts.cdnfonts.com/css/kopi-senja-sans');
    .body {
        font-family: 'Kopi Senja Sans', sans-serif;
        font-size: 16px;
        line-height: 1.5;
        margin: 0;
        padding: 0;
    }
    .file-logo {
        margin-right: -4px;
        margin-top: 10px;
        width: 45px;
        height: 20px;
    }

    .file-preview-item {
        display: flex;
        align-items: center;
        }
    .header {
        font-family: 'Kopi Senja Sans', sans-serif;
        color: #000000;
        padding: 20px;
    }
    h1 {
        position: absolute;
        width: 512px;
        height: 43px;
        left: 650px;
        top: 150px;
        font-size: 32px;
        line-height: 43px;
        
        /* identical to box height */

        display: flex;
        align-items: center;

    }
    .line {
        position: absolute;
        width: 300px;
        height: 0px;
        left: 730px;
        top: 210px;

        border: 2px solid red;
    }

    p {
        position: absolute;
        width: 1383px;
        height: 52px;
        left: 200px;
        top: 240px;

        font-family: 'Anuphan';
        font-style: normal;
        font-size: 20px;
        line-height: 26px;
        display: flex;
        align-items: center;
        text-align: center;
    }

    p2 {
        position: absolute;
        width: 1150px;
        height: 26px;
        left: 350px;
        top: 310px;

        font-family: 'Anuphan';
        font-weight: bold;
        font-size: 20px;
        line-height: 26px;
        /* identical to box height */

        display: flex;
        align-items: center;
        text-align: center;
    }

    .form {
        position: absolute;
        width: 350px;
        height: 84px;
        left: 700px;
        top: 380px;
        
    }

    .form-group{
        padding:10px;
    }

    .btn-primary{
        position: absolute;
        width: 134px;
        height: 48px;
        left: 10px;
        top: 430px; 
        border-radius: 5px;
    }

    .img1 {
        position: absolute;
        left: 8%;
        right: 50%;
        top: 50%;
        bottom: 3.9%;
    }

    .img2 {
        position: absolute;
        left: 74%;
        right: 3.65%;
        top: 49%;
        bottom: 20%;
    }

    @keyframes scale {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(0.6);
    }
    100% {
        transform: scale(1);
    }
    }

    .img1, .img2 {
    animation: scale 3s infinite;
    }

    #logo {
        position: absolute;
        width: 25px;
        height: 25px;
        left: 20px;
        top: 381px;
    }

    .document-container {
        background-color: #f8fafc;
        display: block;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 7px;
        height:38px;
    }
    
    .document-icon {
        cursor: pointer;
    }
    
    .document-input {
        display: none;
    }

    #document-label {
        margin-left: 32px;
        margin-bottom: 50px;
        
    }

    

</style>