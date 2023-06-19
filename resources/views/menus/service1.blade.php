@extends('layouts.main')

@section('content')
@if(session('success'))
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif
<body>
    <div class="container text-center">
        <div class="header">
            <h1>Host Your Dream Event on Campus</h1>
            <div class="line"></div>
        </div>

        <div class="mt-4">
            <p>If you're looking to host an event on campus, you're in the right place. Our platform provides a comprehensive event proposal system that streamlines the process of getting your event approved by the university.</p>
            <p2>Fill out the form below to submit your event proposal and take the first step towards hosting your dream event on campus!</p2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="img1">
                <img src="{{ asset('image/pic1.png') }}" class="img-fluid">
            </div>
        </div>
        <div class="col-md-6">
            <div class="img2">
                <img src="{{ asset('image/pic2.png') }}" class="img-fluid">
            </div>
        </div>
    </div>

        <div class="container">
            <div class="form">
                <form action="{{ route('submit.proposal') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- add CSRF token for security -->

                    <div class="form-group">
                        <label for="club_name">Club Name</label>
                        <select name="club_name" id="club_name" class="form-control">
                            <option value="">Select Club</option>
                            @foreach($clubs as $club)
                                <option value="{{ $club }}">{{ $club }}</option>
                            @endforeach
                        </select>
                        @error('club_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="event-title">Event Title:</label>
                        <input type="text" class="form-control" id="event-title" name="event_title" required>
                    </div>

                    <div class="form-group">
                        <label for="start-date">Event Start Date:</label>
                        <input type="date" class="form-control" id="start-date" name="start_date" required>
                    </div>

                    <div class="form-group">
                        <label for="end-date">Event End Date:</label>
                        <input type="date" class="form-control" id="end-date" name="end_date" required>
                    </div>

                    <div class="form-group">
                        <label for="start-time">Event Start Time:</label>
                        <input type="time" class="form-control" id="start-time" name="start_time" required>
                    </div>

                    <div class="form-group">
                        <label for="end-time">Event End Time:</label>
                        <input type="time" class="form-control" id="end-time" name="end_time" required>
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
                        <label for="document">Attach Document (PDF/DOC):</label>
                        <label class="document-container" for="document">
                            <ion-icon name="document-outline" id="logo" alt="Attach Document" style="cursor:pointer;"></ion-icon>
                            <span id="document-label">Select files</span>
                            <input type="file" class="form-control" id="document" name="document[]" style="display: none;" multiple required>
                        </label>
                        <div id="file-preview"></div>
                    </div>

                    <button type="submit" class="btn btn-primary" id="submit-button" style="background: #5E5BFF">Submit Proposal</button>
                </form>
            </div>
        </div>

    <script>
        const input = document.getElementById('document');
        const label = document.getElementById('document-label');
        const filePreview = document.getElementById('file-preview');
        const submitButton = document.getElementById('submit-button');

        const addedFiles = new Set(); // Set to store the filenames of added files

        input.addEventListener('change', () => {
            if (input.files.length > 0) {
                const uniqueFiles = new Set(); // Set to store unique file names
                let totalFiles = 0; // Variable to track total unique files

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
                    fileName.style.maxWidth = '200px'; // Set the maximum width for the file name
                    fileName.style.overflow = 'hidden'; // Hide any overflowing text
                    fileName.textContent = file.name;
                    filePreviewItem.appendChild(fileName);

                    // Create the delete icon
                    const deleteIcon = document.createElement('ion-icon');
                    deleteIcon.setAttribute('name', 'trash-outline');
                    deleteIcon.setAttribute('class', 'delete-icon');
                    filePreviewItem.appendChild(deleteIcon);

                    // Add event listener to delete icon
                    deleteIcon.addEventListener('click', () => {
                        removeFileFromPreview(filePreviewItem);
                    });

                    filePreview.appendChild(filePreviewItem);

                    // Increase the margin value for each additional file
                    marginValue += 10; // Adjust the value as needed

                    // Add the filename to the set of added files
                    addedFiles.add(file.name);
                    totalFiles++;
                }
                
                // Update the label with the total file count
                label.textContent = `${totalFiles} total file${totalFiles !== 1 ? 's' : ''}`;

                // Set the updated margin value
                submitButton.style.marginTop = `${marginValue}px`;
            } else {
                label.textContent = 'Select files';
                submitButton.style.marginTop = '0';
            }
        });


        // Function to remove a file from the preview
        function removeFileFromPreview(filePreviewItem) {
            const fileName = filePreviewItem.querySelector('span').textContent;
            addedFiles.delete(fileName);
            filePreviewItem.remove();

            // Update the label with the total file count
            const totalFiles = filePreview.querySelectorAll('.file-preview-item').length;
            label.textContent = `${totalFiles} total file${totalFiles !== 1 ? 's' : ''}`;
        }

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
        padding: 10px;
    }
    .file-logo {
        margin-right: 10px;
    }

    .file-preview-item {
        display: flex;
        align-items: center;
    }

    .delete-icon {
        margin-left: auto;
        margin-right: 10px;
        width: 20px;
        height: 30px;
        color: #5E5BFF;
        cursor: pointer;
    }
    .header {
        font-family: 'Kopi Senja Sans', sans-serif;
        color: #000000;
        padding: 20px;
    }
    
    .line {
        position: absolute;
        width: 300px;
        height: 0px;
        left: 700px;
        top: 190px;

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
        width: auto;
        height: auto;
        left: 10px;
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
        top: 637px;
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