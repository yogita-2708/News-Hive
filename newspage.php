<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Portal</title>
    <style>
        .cardcontainer {
            background-color: rgb(29, 3, 54);
        }
        .btn.newstypebtn {
            background-color: rgb(76, 49, 102);
            color: skyblue;
        }
        .btn.newstypebtn:hover {
            color: white;
        }
        .imgborder {
            border: 6px solid rgb(76, 49, 102);
        }
        .btn.readmorebtn {
            background-color: #802be2;
            width: 75px;
        }
        .btn.addbtn {
            background-color: #802be2;
        }
        .btn.addbtn:hover {
            background-color: rgba(255, 255, 255, 0.1); 
            border-color: white; 
            color: white;
        }
        .btn.searchbtn:hover {
            background-color: rgba(255, 255, 255, 0.1); 
            border-color: white; 
            color: white;
        }
        .fixedimage {
            height: 15rem;
        }
    </style>
</head>
<body>
    <?php
    include_once "include/navbar.php";
    ?>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-4">
                <!-- Search Bar -->
                <form class="form-inline" action="newspage.php" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-light text-white searchbtn" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                </form>
            </div>
            <div class="col-md-6 text-md-end mt-3">
                <a href="add_news.php" class="btn btn-outline-light fw-bold text-light addbtn">Add News</a>
            </div>
        </div>

        <div class="row mt-5">
        <?php
        require_once "db/db-connect.php";
        // Delete Message
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
            if ($status === "ok") {
                echo "<div class='alert alert-success' role='alert'>One Record Deleted</div>";
            } else if ($status === "error") {
                echo "<div class='alert alert-danger' role='alert'>Error While Deleting. Check the News ID</div>";
            } else if ($status === "cannot") {
                echo "<div class='alert alert-warning' role='alert'>Only ADMIN can delete this news.</div>";
            }
        }
        // Checking if a search query is submitted
        if (isset($_GET['search'])) {
            $searchKeyword = $_GET['search'];
            $newsQuery = "SELECT * FROM news_details WHERE title LIKE '%$searchKeyword%' OR descn LIKE '%$searchKeyword%' OR category LIKE '%$searchKeyword%'";
            $res = $conn->query($newsQuery);

            // Checking if the query was successful
            if ($res !== false) {
                while($ns = $res->fetch_assoc()) {
                    $userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
        ?>
                    <div class="col-sm-12 col-md-4 d-flex mt-2">
                        <div class="card" style="border-color: rgb(76, 49, 102);">
                            <img src="<?php echo "images/".$ns['picture']; ?>" class="card-img-top imgborder fixedimage" alt="Image">
                            <div class="card-body cardcontainer">
                                <button class="btn btn-sm mb-3 newstypebtn"><?php echo $ns['category']; ?></button>
                                <h5 class="card-title text-white mb-2"><b><?php echo $ns['title']; ?></b></h5>
                                <p class="card-text text-light mt-3" style="text-align: justify;"><?php echo $ns['descn']; ?></p>
                                <?php
                                    // Checking if the user is an admin 
                                    if ($userRole === 'admin') {
                                ?>
                                <a href="edit.php?id=<?php echo $ns['id'];?>" class="btn mt-2 readmorebtn text-light">Edit</a>
                                <a href="delete.php?id=<?php echo $ns['id'];?>" class="btn mt-2 mx-2 btn-danger text-light">Delete</a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "Error in the query: " . $conn->error;
            }
        } else {
            $newsQuery = "SELECT * FROM news_details";
            $res = $conn->query($newsQuery);

            // Checking if the query was successful
            if ($res !== false) {
                while($ns = $res->fetch_assoc()) {
                    $userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
            ?>
                    <div class="col-sm-12 col-md-4 d-flex mt-2">
                        <div class="card" style="border-color: rgb(76, 49, 102);">
                            <img src="<?php echo "images/".$ns['picture']; ?> " class="card-img-top imgborder fixedimage" alt="Image">
                            <div class="card-body cardcontainer">
                                <button class="btn btn-sm mb-3 newstypebtn"><?php echo $ns['category']; ?></button>
                                <h5 class="card-title text-white mb-2"><b><?php echo $ns['title']; ?></b></h5>
                                <p class="card-text text-light mt-3" style="text-align: justify;"><?php echo $ns['descn']; ?></p>
                                <?php
                                    // Checking if the user is an admin 
                                    if ($userRole === 'admin') {
                                ?>
                                <a href="edit.php?id=<?php echo $ns['id'];?>" class="btn mt-2 readmorebtn text-light">Edit</a>
                                <a href="delete.php?id=<?php echo $ns['id'];?>" class="btn mt-2 mx-2 btn-danger text-light">Delete</a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                echo "Error in the query: " . $conn->error;
            }
        }
        ?>
        </div>
    </div>
    <?php
    include_once "include/footer.php";
    ?>
</body>
</html>
