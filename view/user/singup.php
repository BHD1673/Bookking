<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *,
        *:before,
        *:after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
            background: #ffffff;
        }

        input,
        button {
            border: none;
            outline: none;
            background: none;
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
        }

        .tip {
            font-size: 20px;
            margin: 40px auto 50px;
            text-align: center;
        }

        .cont {
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            width: 900px;
            height: 550px;
            margin: 0 auto 100px;
            background: #fff;
            box-shadow: -10px -10px 15px rgba(255, 255, 255, 0.3), 10px 10px 15px rgba(70, 70, 70, 0.15), inset -10px -10px 15px rgba(255, 255, 255, 0.3), inset 10px 10px 15px rgba(70, 70, 70, 0.15);
        }

        .form {
            position: relative;
            width: 640px;
            height: 100%;
            -webkit-transition: -webkit-transform 1.2s ease-in-out;
            transition: -webkit-transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
            padding: 50px 30px 0;
        }

        .sub-cont {
            overflow: hidden;
            position: absolute;
            left: 640px;
            top: 0;
            width: 900px;
            height: 100%;
            padding-left: 260px;
            background: #fff;
            -webkit-transition: -webkit-transform 1.2s ease-in-out;
            transition: -webkit-transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
        }

        .cont.s--signup .sub-cont {
            -webkit-transform: translate3d(-640px, 0, 0);
            transform: translate3d(-640px, 0, 0);
        }

        button {
            display: block;
            margin: 0 auto;
            width: 260px;
            height: 36px;
            border-radius: 30px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
        }

        .img {
            overflow: hidden;
            z-index: 2;
            position: absolute;
            left: 0;
            top: 0;
            width: 260px;
            height: 100%;
            padding-top: 360px;
        }

        .img:before {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            width: 900px;
            height: 100%;
            background-image: url("ext.jpg");
            opacity: .8;
            background-size: cover;
            -webkit-transition: -webkit-transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
        }

        .img:after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }

        .cont.s--signup .img:before {
            -webkit-transform: translate3d(640px, 0, 0);
            transform: translate3d(640px, 0, 0);
        }

        .img__text {
            z-index: 2;
            position: absolute;
            left: 0;
            top: 50px;
            width: 100%;
            padding: 0 20px;
            text-align: center;
            color: #fff;
            -webkit-transition: -webkit-transform 1.2s ease-in-out;
            transition: -webkit-transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
        }

        .img__text h2 {
            margin-bottom: 10px;
            font-weight: normal;
        }

        .img__text p {
            font-size: 14px;
            line-height: 1.5;
        }

        .cont.s--signup .img__text.m--up {
            -webkit-transform: translateX(520px);
            transform: translateX(520px);
        }

        .img__text.m--in {
            -webkit-transform: translateX(-520px);
            transform: translateX(-520px);
        }

        .cont.s--signup .img__text.m--in {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }

        .img__btn {
            overflow: hidden;
            z-index: 2;
            position: relative;
            width: 100px;
            height: 36px;
            margin: 0 auto;
            background: transparent;
            color: #fff;
            text-transform: uppercase;
            font-size: 15px;
            cursor: pointer;
        }

        .img__btn:after {
            content: '';
            z-index: 2;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border: 2px solid #fff;
            border-radius: 30px;
        }

        .img__btn span {
            position: absolute;
            left: 0;
            top: 0;
            display: -webkit-box;
            display: flex;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            align-items: center;
            width: 100%;
            height: 100%;
            -webkit-transition: -webkit-transform 1.2s;
            transition: -webkit-transform 1.2s;
            transition: transform 1.2s;
            transition: transform 1.2s, -webkit-transform 1.2s;
        }

        .img__btn span.m--in {
            -webkit-transform: translateY(-72px);
            transform: translateY(-72px);
        }

        .cont.s--signup .img__btn span.m--in {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        .cont.s--signup .img__btn span.m--up {
            -webkit-transform: translateY(72px);
            transform: translateY(72px);
        }

        h2 {
            width: 100%;
            font-size: 26px;
            text-align: center;
        }

        label {
            display: block;
            width: 260px;
            margin: 25px auto 0;
            text-align: center;
        }

        label span {
            font-size: 12px;
            color: #cfcfcf;
            text-transform: uppercase;
        }

        input {
            display: block;
            width: 100%;
            margin-top: 5px;
            padding-bottom: 5px;
            font-size: 16px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.4);
            text-align: center;
        }

        .forgot-pass {
            margin-top: 15px;
            text-align: center;
            font-size: 12px;
            color: #cfcfcf;
        }

        .submit {
            margin-top: 40px;
            margin-bottom: 20px;
            background: #d4af7a;
            text-transform: uppercase;
        }

        .fb-btn {
            border: 2px solid #d3dae9;
            color: #8fa1c7;
        }

        .fb-btn span {
            font-weight: bold;
            color: #455a81;
        }

        .sign-in {
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
        }

        .cont.s--signup .sign-in {
            -webkit-transition-timing-function: ease-in-out;
            transition-timing-function: ease-in-out;
            -webkit-transition-duration: 1.2s;
            transition-duration: 1.2s;
            -webkit-transform: translate3d(640px, 0, 0);
            transform: translate3d(640px, 0, 0);
        }

        .sign-up {
            -webkit-transform: translate3d(-900px, 0, 0);
            transform: translate3d(-900px, 0, 0);
        }

        .cont.s--signup .sign-up {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .error-message {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <br>
    <br>
    <div class="cont">
        <div class="form sign-in">
        <h2>Welcome</h2>
       
            <form action="index.php?act=dangnhap" method="post" >
            <label>
                <span>Email</span>
                <input type="email" name="email" id="emailSignInInput" />
                <p class="error-message" id="emailSignInError"></p>
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="pass" id="passwordSignInInput" />
                <p class="error-message" id="passwordSignInError"></p>  
            </label>
            <p class="forgot-pass"><a href="index.php?act=forgot">Forgot password?</a></p>
            <button type="button" class="submit"  onclick="signIn()"><input type="submit" name="dangnhap" value="Dang Nhap"></button>
           
            </form>

           
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">

                    <h3>Don't have an account? Please Sign up!<h3>
                </div>
                <div class="img__text m--in">

                    <h3>If you already has an account, just sign in.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">
                <form action="index.php?act=dangky" method="post">
                    <h2>Create your Account</h2>
                    <label>
                        <span>Name</span>
                        <input type="text" id="nameSignUp" name="user" />
                        <p class="error-message" id="nameSignUpError"></p>
                    </label>
                    <label>
                        <span>Email</span>
                        <input type="email" id="emailSignUp" name="email" />
                        <p class="error-message" id="emailSignUpError"></p>
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password" id="passwordSignUp" name="pass" />
                        <p class="error-message" id="passwordSignUpError"></p>
                    </label>
                    <button type="button"  class="submit" onclick="signUp()"><input type="submit" name="dangky" value="Dang Ky"><a href="index.php?act=dangnhap"></a></button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });

        function signIn() {
            var emailSignIn = document.getElementById('emailSignInInput').value;
            var passwordSignIn = document.getElementById('passwordSignInInput').value;

            // Validate email
            var emailSignInError = document.getElementById('emailSignInError');
            emailSignInError.textContent = '';
            if (!emailSignIn.trim()) {
                emailSignInError.textContent = 'Please enter your email.';
                return;
            }

            // Validate password
            var passwordSignInError = document.getElementById('passwordSignInError');
            passwordSignInError.textContent = '';
            if (!passwordSignIn.trim()) {
                passwordSignInError.textContent = 'Please enter your password.';
                return;
            }

            // If all validations pass, you can proceed with the sign-in logic
            // For now, I'll just log a message
            console.log('Sign In Logic Here');
        }

        function signUp() {
            var nameSignUp = document.getElementById('nameSignUp').value;
            var emailSignUp = document.getElementById('emailSignUp').value;
            var passwordSignUp = document.getElementById('passwordSignUp').value;

            // Validate name
            var nameSignUpError = document.getElementById('nameSignUpError');
            nameSignUpError.textContent = '';
            if (!nameSignUp.trim()) {
                nameSignUpError.textContent = 'Please enter your name.';
                return;
            }

            // Validate email format
            var emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var emailSignUpError = document.getElementById('emailSignUpError');
            emailSignUpError.textContent = '';
            if (!emailFormat.test(emailSignUp.trim())) {
                emailSignUpError.textContent = 'Please enter a valid email address.';
                return;
            }

            // Validate password strength
            var passwordStrength = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
            var passwordSignUpError = document.getElementById('passwordSignUpError');
            passwordSignUpError.textContent = '';
            if (!passwordStrength.test(passwordSignUp)) {
                passwordSignUpError.textContent = 'Password must be at least 8 characters long and include at least one lowercase letter, one uppercase letter, and one digit.';
                return;
            } else {
                alert("Đăng ký thành công");
            }

            // If all validations pass, you can proceed with the sign-up logic
            // For now, I'll just log a message
            console.log('Sign Up Logic Here');
        }
    </script>
</body>

</html>