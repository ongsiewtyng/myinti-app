@extends('layouts.app')

@section('content')
@if ($errors->has('login') || $errors->has('password') || $errors->has('email'))
    <div class="alert alert-danger" role="alert">
        @if ($errors->has('login'))
            {{ $errors->first('login') }}
        @endif
        @if ($errors->has('password'))
            {{ $errors->first('password') }}
        @endif
        @if ($errors->has('email'))
            @if ($errors->first('email') === 'validation.regex')
                The email must be in the format "p********@student.newinti.edu.my".
            @else
                {{ $errors->first('email') }}
                The email must be in the format "p********@student.newinti.edu.my".
            @endif
        @endif
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<section>
    <div class="form-box">
        <div class="form-value">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h2>Register</h2>

                <div class="inputbox">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus>
                    <label for="">Name</label>
                </div>

                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    <label for="">Student Email</label>
                </div>

                <div class="inputbox">
                    <ion-icon name="eye-outline" onclick="togglePasswordVisibility()"></ion-icon>
                    <input type="password" name="password" id="password" required>
                    <label for="">Password</label>
                </div>

                <div class="inputbox">
                    <ion-icon class="confirm" name="eye-outline" onclick="toggleConfirmPasswordVisibility()" id="password-toggle"></ion-icon>
                    <input type="password" name="password_confirmation" id="password_confirm" required>
                    <label for="">Confirm Password</label>
                </div>

                <button type="submit">Register</button>

                <div class="register">
                    <p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
                </div>
            </form>
        </div>
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
        var confirmPasswordField = document.getElementById("password_confirm");
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

@endsection

@section('styles')

<style>
    section{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 50vh;
    width: 100%;
    }
    .form-box{
    position: relative;
    width: 400px;
    height: 550px;
    background: transparent;
    border: 2px solid rgba(255,255,255,0.5);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    display: flex;
    justify-content: center;
    align-items: center;
    }
    h2{
        font-size: 2em;
        color: #000000;
        text-align: center;
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
    }
    input:focus ~ label,
    input:valid ~ label{
    top: -5px;
    }
    .inputbox input {
        width: 100%;
        height: 50px;
        background: transparent;
        border: none;
        outline: none;
        font-size: 1em;
        padding:0 35px 0 5px;
        color: #000000;
    }
    .inputbox ion-icon{
        position: absolute;
        right: 8px;
        color: #000000;
        font-size: 1.2em;
        top: 20px;
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
    }
    .register{
        margin-top: 20px;
        text-align: center;
    }
</style>
