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
    </style>
</head>
<body>
<div class="container dfg">  
        <ul class="nav nav-pills nav-justified mb-2" role="tablist">
            <li class="nav-item"><a href="#" class="nav-link">REGISTRATION</a></li><br>
            <li class ="nav-item"><a href="#"class="nav-link active" style="background-color: #802be2;" data-toggle="pill">LOGIN</a></li>
        </ul>
    <form action="" method="post">
        <div class="form-group">
            <label>EMAIL</label>
            <input type="email" name="email" class="form-control mb-3" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>PASSWORD</label>
            <input type="password" name="pass" class="form-control mb-2" placeholder="Enter password">
        </div><br>
        <div class="form-group">
            <input type="submit" name="login" class="btn btn-outline-light fw-bold px-4 loginbtn mb-3" value="Login">
        </div> 
        <p> Don't have an account? <a href="register.php">Register now</a>.</p>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<?php
    session_start();
    require_once "db/db-connect.php";
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        if(!empty($email) && !empty($pass)) {
            $qry = "SELECT * FROM register WHERE email='$email' AND pass='$pass' ";
            $res = $conn->query($qry);
            if($res->num_rows > 0){
                $log = $res -> fetch_assoc();
                $role = $log['role'];
                if($log['email']===$email && $log['pass']===$pass){
                    // session_start();
                    $_SESSION['email'] = $log['email'];
                    $_SESSION['role'] = $role;
                    $_SESSION['name'] = $log['username'];
                    header("location:dashboard.php");
                }
            }
            else{
                echo "Error : ".$conn->error;
            }
        }
        $conn->close();
    }
?>
</html>
