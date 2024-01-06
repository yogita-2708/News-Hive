<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        .wholecontainer {
            background-color: rgb(29, 3, 54);
        }
        nav {
            background-color: blueviolet;
        }
        .btn.loginnav {
            border-radius: 2rem;
        }
        .btn.loginnav:hover {
            background-color: rgba(255, 255, 255, 0.2); 
            border-color: white; 
            color: white;
            border-radius: 2rem;
        }
    </style>
</head>
<body class="wholecontainer">
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top p-0">
        <a class="navbar-brand" href="#">
            <img class="image-fluid w-25 ms-2" src="images\logo.jpg" alt="NewsHive">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item <?php echo (isset($_SESSION['email'])) ? 'active' : ''; ?>">
                    <?php if(isset($_SESSION['email'])) { ?>
                        <a class="navbar-brand mx-3 fs-5" href="dashboard.php"><i class="bi bi-house-fill mx-2"></i>Dashboard</a>
                    <?php } else { ?>
                        <span class="navbar-brand mx-3 fs-5"><i class="bi bi-house-fill mx-2"></i>Dashboard</span>
                    <?php } ?>
                </li>
                <li class="nav-item <?php echo (isset($_SESSION['email'])) ? 'active' : ''; ?>">
                    <?php if(isset($_SESSION['email'])) { ?>
                        <a class="navbar-brand mx-3 fs-5" href="newspage.php"><i class="bi bi-newspaper mx-2"></i>News</a>
                    <?php } else { ?>
                        <span class="navbar-brand mx-3 fs-5"><i class="bi bi-newspaper mx-2"></i>News</span>
                    <?php } ?>
                </li>
                <li class="nav-item <?php echo (isset($_SESSION['email'])) ? 'active' : ''; ?>">
                    <?php if(isset($_SESSION['email'])) { ?>
                        <a class="navbar-brand mx-3 fs-5" href="category.php"><i class="bi bi-grid-fill mx-2"></i>Category</a>
                    <?php } else { ?>
                        <span class="navbar-brand mx-3 fs-5"><i class="bi bi-grid-fill mx-2"></i>Category</span>
                    <?php } ?>
                </li>
            </ul>
        </div>
        <?php if(isset($_SESSION['email'])){ ?>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav d-flex">
                    <li class="nav-item">
                        <h5 class="text-white mt-1">Welcome!!! <?php echo $_SESSION['name'];  ?></h5>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand mx-3 fs-6 px-4 btn btn-outline-light loginnav" href="logout.php">LogOut</a>
                    </li>
                </ul>
            </div>
        <?php } else { ?>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="navbar-brand mx-3 fs-6 px-4 btn btn-outline-light loginnav" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand mx-3 fs-6 px-4 btn btn-outline-light loginnav" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        <?php } ?>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
