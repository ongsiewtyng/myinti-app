@extends('layouts.app')

@section('content')
<body style="overflow: hidden;">
    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="POST" action="{{ route('dashboard') }}"> 
                    @csrf
                    <h2>Admin Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="login" :value="old('login')" required autofocus>
                        <label for="login">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <ion-icon name="eye-outline" onclick="togglePasswordVisibility()" id= "password-toggle"></ion-icon>
                        <input type="password" name="password" id="password" required autocomplete="current-password">
                        <label for="">Password</label>
                    </div>
                    <button type="submit">Log in</button>
                    <div class="student">
                        <p>Student? <a href="{{ route('login') }}">Login Here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var eyeIcon = document.querySelector("#password-toggle[name='eye-outline']");
            var eyeOffIcon = document.querySelector("#password-toggle[name='eye-off-outline']");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.setAttribute("name", "eye-off-outline");
            } else {
                passwordField.type = "password";
                eyeOffIcon.setAttribute("name", "eye-outline");
            }
        }
    </script>
</body>
@endsection


@section('styles')
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
        left: 262px;
        top: 60%;
        transform: translateY(-50%);
    }
    .forget{
        margin: -10px 0 15px ;
        height:20px;
        font-size: .9em;
        color:#000000;
        display: flex; 
    }
    .forget label{
        display: flex;
        justify-content: space-between; 
        align-items: center;
        width: 100%;
    }

    .forget label input{
        margin-right: 2px;
        
    }
    .fpass{
        text-align:center;
        margin-top:10px;
        color: #000000;
        text-decoration: none;
    }
    .forget label a:hover{
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
    }
    .student{
        font-size: 14px;
        color: #000000;
        text-align: center;
        margin: 25px 0 10px;
    }
    .student p a{
        text-decoration: none;
        color: #000000;
        font-weight: 600;
    }
    .student p a:hover{
        text-decoration: underline;
    }
    
</style>
                