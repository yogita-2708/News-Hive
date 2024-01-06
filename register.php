<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & login form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url("images/newspapers.jpg"); 
            position: relative;
            min-height: 100vh;
            background-size: cover;
            background-position: right;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dfg {
            background: rgba(255, 255, 255, 0.05);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0, 2);
            border-radius: 15px;
            backdrop-filter: blur(100px);
            color: white;
            width: 40%;
            padding: 1rem;
        }

        .form-control {   
            border: none;
            background: transparent;
            border-bottom: 1px solid black;
        }

        ::placeholder {
            color: white;
            opacity: 0.4;
        }

        .btn.loginbtn {
            background-color: #802be2;
            color: white;
        }

        .btn.loginbtn:hover {
            background-color: rgb(37, 3, 68);
            border-color: white;
            color: white;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container dfg">
        <ul class="nav nav-pills nav-justified mb-3" role="tablist">
            <li class="nav-item"><a href="#" class="nav-link active" style="background-color: #802be2;" data-toggle="pill">REGISTRATION</a></li><br>
            <li class ="nav-item"><a href="#"class="nav-link">LOGIN</a></li>
        </ul>
    <form action="reg_check.php" method="post" onsubmit="validate(event)">
        <div class ="form-group ">
            <label for="username">USERNAME</label>
            <input type="text" name ="username" class="form-control mb-2" placeholder="Enter Name">
        </div>
        <div class ="form-group ">
            <label>EMAIL</label>
            <input type="email" name="email" id="email" class="form-control mb-2" placeholder= "Enter Email">
            <label for="" id="emailError" class="error"></label>
        </div>
        <div class ="form-group ">
            <label>PASSWORD</label>
            <input type="password" name="pass" id="password" class="form-control mb-2" placeholder= "Enter Password">
            <label for="" id="passwordError" class="error"></label>
        </div>
        <div class ="form-group ">
            <label>CONFIRM PASSWORD</label>
            <input type="password" name="cpass" id="cpassword" class="form-control mb-2" placeholder= "Enter same Password">
            <label for="" id="cpasswordError" class="error"></label>
        </div><br>
        <div class ="form-group">
            <input type="submit" class="btn btn-outline-light fw-bold px-4 loginbtn mb-3" value="Register" name="submit">
        </div>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
    </form>
    <script>
        function validate(e) {
            try {
                let email = document.getElementById("email").value
                let password = document.getElementById("password").value
                let cpassword = document.getElementById("cpassword").value
                let error = false;
                let emailError = document.getElementById("emailError")
                let passwordError = document.getElementById("passwordError")
                let cpasswordError = document.getElementById("cpasswordError")

                let emailPat = /^[\w\.]{5,}@[a-zA-Z\.]{5,}\.[a-zA-Z]{3,}/
                if (email === "" || email === null) {
                    emailError.innerHTML = "Email is required"
                    error = true;
                } else if (!email.match(emailPat)) {
                    emailError.innerHTML = "Please enter a valid email"
                    error = true;
                } else {
                    emailError.innerHTML = ""
                }

                let passPat = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@$*^%#!]).{8,16}$/;
                if (password === "" || password === null) {
                    passwordError.innerHTML = "Password is required";
                    error = true;
                } else if (!password.match(passPat)) {
                    passwordError.innerHTML = "Please enter a valid password";
                    error = true;
                } else {
                    passwordError.innerHTML = "";
                }

                if (cpassword === "" || cpassword === null) {
                    cpasswordError.innerHTML = "Confirm Password is required"
                    error = true;
                } else if (cpassword != password) {
                    cpasswordError.innerHTML = "Confirm password must be the same as password"
                    error = true
                } else {
                    cpasswordError.innerHTML = ""
                }

                if (error) {
                    e.preventDefault();
                }
                } catch (error) {
                    e.preventDefault();
                }
            }
    </script>   
</body>
</html>



