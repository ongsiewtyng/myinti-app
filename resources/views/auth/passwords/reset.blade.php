@extends('layouts.app')

@section('content')
<body style="overflow: hidden;">
    <section>
        <div class="form-box">
            <div class="form-value">
                <h2>Reset Password</h2>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        <label for="email">Email</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="inputbox">
                        <ion-icon name="eye-outline" onclick="togglePasswordVisibility()" id= "password-toggle"></ion-icon>
                        <input type="password" name="password" id="password" required>
                        <label for="password">New Password</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="inputbox">
                        <ion-icon class="confirm" name="eye-outline" onclick="toggleConfirmPasswordVisibility()" id="password-toggle"></ion-icon>
                        <input type="password" name="password_confirmation" id="password_confirm" required>
                        <label for="password_confirmation">Confirm Password</label>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit">{{ __('Reset Password') }}</button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>



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

@endsection

@section('styles')
<style>
    <style>
    img {
    max-width: 100%;
    height: auto;
    
    }
    
    section{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 70vh;
    width: 100%;
    
    }

    .form-box{
    position: relative;
    width: 400px;
    height: 450px;
    background: transparent;
    border: 2px solid rgba(0,0,0,0.1);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    display: flex;
    justify-content: center;
    align-items: center;
    }
    .form-box{
    position: relative;
    width: 400px;
    height: 450px;
    background: transparent;
    border: 2px solid rgba(0,0,0,1);
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
    .inputbox #password-toggle {
        position: absolute;
        left: 283px;
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
    }
    
</style>
