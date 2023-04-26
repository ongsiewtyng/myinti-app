@extends('layouts.main')

@section('content')

<title>@yield('title', 'Edit Profile')</title>

<body?>
    <section>
    <div class="form-box">
        <form method="POST" action="{{ url('update/'.$user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <h2>Edit Profile</h2>
            <div class="inputbox">
                <input type="text" name="name" id="name" value="{{ $user->name }}" required autocomplete="name">
                <label for="name">{{ __('Name') }}</label>
                <ion-icon name="person-outline"></ion-icon>
            </div>

            <div class="inputbox">
                <input type="email" name="email" id="email" value="{{ $user->email }}" required autocomplete="email">
                <label for="email">{{ __('Email Address') }}</label>
                <ion-icon name="mail-outline"></ion-icon>
            </div>

            <div class="inputbox">
                <input type="password" name="password" id="password" required autocomplete="new-password">
                <label for="password">{{ __('New Password') }}</label>
                <ion-icon name="eye-outline" onclick="togglePasswordVisibility()"></ion-icon>
            </div>

            <div class="inputbox">
                <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
                <label for="password_confirmation">{{ __('Confirm New Password') }}</label>
                <ion-icon class="confirm" name="eye-outline" onclick="toggleConfirmPasswordVisibility()" id="password-toggle"></ion-icon>
            </div>
        
            <div class="avatar">
                <input id="pic" type="file" class="form-control" name = "pic">
                <img src="{{ asset('myinti/users/' . ($user->pic ? $user->pic : 'pic.png')) }}" style="width: 100px; height: 100px; border-radius: 50%;">
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

    .profile{
        margin: 70px 0 15px ;
        height: 20px;
        font-size: .9em;
        color:#000000;
        display: flex; 
    }

    .profile label{
        display: flex;
        justify-content: space-between; 
        align-items: center;
        width: 100%;
    }

    .profile label input{
        margin-right: 2px;
    }

    .profile label a:hover{
        text-decoration: underline;
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
        left: 20%;
        transform: translateX(-50%);
        top: 50%;
        margin-top: -200px; /* adjust the margin as necessary */
        display: flex;
        flex-direction: column-reverse;
        justify-content: center;
        align-items: center;
    }


    .avatar img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 20px;
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
</style>

