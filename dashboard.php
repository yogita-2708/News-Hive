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
            /* background-color: rgb(63, 45, 80); */
            background-color: rgb(76, 49, 102);
            /* color: rgb(193, 156, 228); */
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
        }
        .fixedimage {
            height: 360px;
        }
    </style>
</head>
<body>
    <?php
    include_once "include/navbar.php";
    ?>
    <div class="container mt-5">
    <?php
     require_once "db/db-connect.php";
        // Update Message
        if (isset($_GET['update'])) {
            $status = $_GET['update'];
            if ($status === "ok") {
                echo "<div class='alert alert-success' role='alert'>One Record Updated</div>";
            } else if ($status === "error") {
                echo "<div class='alert alert-danger' role='alert'>Error While Updating. Check the News ID</div>";
            }
        }               
     $qry = "SELECT * FROM news_details";
     $res = $conn->query($qry);
     while($ns = $res->fetch_assoc()){
    ?>
        <!-- row 1 -->
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card border-0">
                    <img src="<?php echo "images/".$ns['picture']; ?>" class="card-img-top imgborder fixedimage" alt="Image">
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card-body">
                    <button class="btn btn-sm mb-3 newstypebtn"><?php echo $ns['category']; ?></button>
                    <h4 class="card-title text-white"><b><?php echo $ns['title']; ?></b></h4>
                    <p class="card-text mt-3 text-light" style="text-align: justify;"><?php echo $ns['descn']; ?></p>
                    <a href="single_news.php?id=<?php echo $ns['id'];?>" class="btn mt-3 readmorebtn text-light">Read More</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
</body>
</html>
<?php
    include_once "include/footer.php";
?>