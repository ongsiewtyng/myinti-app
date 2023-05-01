@extends('layouts.main')

@section('content')

<title>@yield('title', 'Edit Profile')</title>

<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif
    <section>
    <div class="form-box">
        <form method="POST" action="{{ url('update/'.$user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <h2>Edit Profile</h2>
            <div class="inputbox">
                <input type="text" name="name" id="name" value="{{ $user->name }}"  autocomplete="name">
                <label for="name">{{ __('Name') }}</label>
                <ion-icon name="person-outline"></ion-icon>
            </div>

            <div class="inputbox">
                <input type="email" name="email" id="email" value="{{ $user->email }}" readonly>
                <label for="email" style="top:0%" >{{ __('Email Address') }}</label>
                <ion-icon name="mail-outline"></ion-icon>
            </div>

            <div class="inputbox">
                <input type="password" name="password" id="password" autocomplete="new-password">
                <label for="password">{{ __('New Password') }}</label>
                <ion-icon name="eye-outline" onclick="togglePasswordVisibility()"></ion-icon>
            </div>

            <div class="inputbox">
                <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password">
                <label for="password_confirmation">{{ __('Confirm New Password') }}</label>
                <ion-icon class="confirm" name="eye-outline" onclick="toggleConfirmPasswordVisibility()" id="password-toggle"></ion-icon>
            </div>
            
            <div class="avatar-container">
                <div class="avatar">
                    <input id="pic" type="file" class="form-control" name = "pic" style="display: none;">
                    <div class="circle">
                        <label class="avatar-label" for="pic">
                            <ion-icon name="create-outline" style="cursor:pointer;"></ion-icon>
                        </label>
                        @if(Auth::user()->pic)
                        <img id="preview" src="{{ asset('uploads/users/'. Auth::user()->pic) }}" style="width: 200px; height: 200px; border-radius: 50%;">
                        @else
                        <img id="preview" src="{{ asset('pic.png')}}" style="width: 200px; height: 200px; border-radius: 50%;">
                        @endif
                    </div>
                </div>
                <div class="joined">
                    <p style="font-weight: bold;">Joined</p>
                    <p>{{ Auth::user()->created_at->format('d/m/Y') }}</p>
                </div>
            </div>

            <button type="submit" style="margin-top: 20px;">{{ __('Save Changes') }}</button>
        </form>
    </div>
    </section>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var eyeIcon = document.querySelector("ion-icon[name='eye-outline']:first-of-type");
            var eyeOffIcon = document.querySelector("ion-icon[name='eye-off-outline']:first-of-type");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.setAttribute("name", "eye-off-outline");
            } else {
                passwordField.type = "password";
                eyeOffIcon.setAttribute("name", "eye-outline");
            }
        }

        function toggleConfirmPasswordVisibility() {
            var confirmPasswordField = document.getElementById("password_confirmation");
            var confirmEyeIcon = document.querySelector("#password-toggle[name='eye-outline']:last-of-type");
            var confirmEyeOffIcon = document.querySelector("#password-toggle[name='eye-off-outline']:last-of-type");
            if (confirmPasswordField.type === "password") {
                confirmPasswordField.type = "text";
                confirmEyeIcon.setAttribute("name", "eye-off-outline");
            } else {
                confirmPasswordField.type = "password";
                confirmEyeOffIcon.setAttribute("name", "eye-outline");
            }
        }

        function previewFile(input) {
            var preview = document.querySelector('#preview');
            var file    = input.files[0];
            var reader  = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }

        var picInput = document.querySelector('#pic');
        picInput.addEventListener('change', function() {
            previewFile(this);
        });

    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body> 
@endsection

@section('styles')
<style>
    section{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 70vh;
        width: 100%;
    }

    .form-container{
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 400px;
        padding: 40px;
        border-radius: 5px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        background-color: #000000;
    }

    .form-container h2{
        font-size: 2em;
        color: #000000;
        text-align: center;
        margin-top:0;
    }

    .inputbox{
        position: relative;
        margin: 30px 0;
        width: 310px;
        border-bottom: 2px solid #000000;
    }

    .inputbox label{
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        color: #000000;
        font-size: 1em;
        pointer-events: none;
        transition: .5s;
        font-weight: bold;
    }

    .inputbox input:focus ~ label,
    .inputbox input:valid ~ label{
        top: -5px;
    }

    .inputbox input {
        width: 100%;
        height: 50px;
        background: transparent;
        border: none;
        outline: none;
        font-size: 1em;
        padding: 0 35px 0 5px;
        color: #000000;
    }

    .inputbox ion-icon{
        position: absolute;
        right: 8px;
        color: #000000;
        font-size: 1.2em;
        top: 20px;
    }

    .inputbox ion-icon #password-toggle {
        position: absolute;
        left: 262px;
        top: 60%;
        transform: translateY(-50%);
    }

    button{
        width: 100%;
        height: 40px;
        border-radius: 40px;
        background: #fff;
        border: 3px solid #000000;
        outline: none;
        cursor: pointer;
        font-size: 1em;
        font-weight: 600;
        margin-top: 30px;
    }

    .inputbox ion-icon #password-toggle {
        position: absolute;
        left: 262px;
        top: 60%;
        transform: translateY(-50%);
    }

    .avatar {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 50%;
        margin-top: -200px; /* adjust the margin as necessary */
        display: flex;
        flex-direction: column-reverse;
        justify-content: center;
        align-items: center;
    }

    .avatar img {
        object-fit: cover;
        margin-bottom: 20px;
    }

    .avatar-container{
        box-sizing: border-box;

        position: absolute;
        width: 300px;
        height: 500px;
        left: 251px;
        top: 160px;

        border: 1px solid #000000;
        border-radius: 20px;

    }

    .avatar-label {
        position: absolute;
        display: none;
        left: 30px;
        top: 35px;
        transform: translate(-50%, -50%);
        cursor: pointer;
        
    }

    .avatar:hover .avatar-label {
        display: block;
        
    }
    
    .avatar-label ion-icon {
        position: absolute;
        width: 70px;
        height: 80px;
        left: 40px;
        top: 20px;
        
        
    }

    .circle:hover{
        width: 200px; 
        height: 200px; 
        background:#CECECE;
        border-radius: 50%;
        opacity:50%;

    }

    .joined{
        position: absolute;
        left: 105px;
        top: 290px;
        text-align:center;
        font-family:'Anuphan','sans-serif';
    }

    .error-message{
        color: red;
        font-size: 0.8em;
        margin-top: 5px;
    }

    .success-message{
        color: green;
        font-size: 0.8
    }

    .alert {
        width: 236px;
        height: 58px;
        left: 750px;
        top: 11px;
    }

</style>

