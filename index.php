<?php
require_once "Config/database.php";
echo<<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Login & Registration Form</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0b1a3b;
            background-image: url(r.jpg);
        }

        .container {
            position: relative;
            max-width: 430px;
            width: 100%;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(71, 58, 58, 0.1);
            overflow: hidden;
            margin: 0 20px;
        }

        .container .forms {
            display: flex;
            align-items: center;
            height: 440px;
            width: 200%;
            transition: height 0.2s ease;
        }

        .container .form {
            width: 50%;
            padding: 30px;
            background-color: #fff;
            transition: margin-left 0.18s ease;
        }

        .container.active .login {
            margin-left: -50%;
            opacity: 0;
            transition: margin-left 0.18s ease, opacity 0.15s ease;
        }

        .container.active .forms {
            height: 600px;
        }

        .container .form .title {
            position: relative;
            font-size: 27px;
            font-weight: 600;
        }

        .form .title::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            background-color: #d371a2;
            border-radius: 25px;
        }

        .form .input-field {
            position: relative;
            height: 50px;
            width: 100%;
            margin-top: 30px;
        }

        .input-field input {
            position: absolute;
            height: 100%;
            width: 100%;
            padding: 0 35px;
            border: none;
            outline: none;
            font-size: 16px;
            border-bottom: 2px solid #ccc;
            border-top: 2px solid transparent;
            transition: all 0.2s ease;
        }

        .input-field input:is(:focus, :valid) {
            border-bottom-color: #4070f4;
        }

        .input-field i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 23px;
            transition: all 0.2s ease;
        }

        .input-field input:is(:focus, :valid)~i {
            color: #4070f4;
        }

        .input-field i.icon {
            left: 0;
        }

        .input-field i.showHidePw {
            right: 0;
            cursor: pointer;
            padding: 10px;
        }

        .form .checkbox-text {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }

        .checkbox-text .checkbox-content {
            display: flex;
            align-items: center;
        }

        .checkbox-content input {
            margin: 0 8px -2px 4px;
            accent-color: #4070f4;
        }

        .form .text {
            color: #333;
            font-size: 14px;
        }

        .form a.text {
            color: #4070f4;
            text-decoration: none;
        }

        .form a:hover {
            text-decoration: underline;
        }

        .form .button {
            margin-top: 35px;
        }

        .form .button input {
            border: none;
            color: #fff;
            font-size: 17px;
            font-weight: 500;
            letter-spacing: 1px;
            border-radius: 6px;
            background-color: #4070f4;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .button input:hover {
            background-color: #6faf34;
        }

        .login-signup {
            margin-top: 30px;
            text-align: center;

        }
    </style>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login"><span class="" style="display: flex;/* align-content: center; */justify-content: center;font-size: 35px;font-style: oblique;">Evaluation System</span>
                <span class="title" style="justify-content: center;justify-items: center;align-content: center;display: flex;">Login</span>
    <form action="login.php" method="POST">
        <div class="input-field">
            <input type="text" placeholder="Enter your email" name="email" required="">
            <i class="uil uil-envelope icon"></i>
        </div>
        <div class="input-field">
            <input type="password" class="password" placeholder="Enter your password" name="password" required="">
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
        </div>
        <div class="checkbox-text">
            <div class="checkbox-content"><input type="checkbox" id="logCheck"><label for="logCheck" class="text">Remember
                    me</label></div><a href="#" class="text">Forgot password?</a>
        </div>
        <div class="input-field button"><input type="submit" name="submit" value="Login">Login</div>
    </form>




    <script>function check_pass() {
            if (document.getElementById('f_pass').value == document.getElementById('fr_pass').value) {
                document.getElementById('st_header').disabled = false;
            }

            else {
                document.getElementById('st_header').disabled = true;
            }
        }

    </script>

    <script id="rendered-js">
        function showSignup() {
            document.getElementById("signupid").style.display = "flex";
            document.getElementById("loginid").style.display = "none";
        }

        function showLogin() {
            document.getElementById("signupid").style.display = "none";
            document.getElementById("loginid").style.display = "flex";
        }
    </script>


</div></div></div></body>

</html>

EOT;

?>