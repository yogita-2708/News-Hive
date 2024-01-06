<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single News Page</title>
    <style>
        .cardcontainer {
            background-color: rgb(29, 3, 54);
        }
        .imgborder {
            border: 6px solid rgb(76, 49, 102);
        }
        .btn.editbtn {
            background-color: #802be2;
        }
        .full-news-card {
            background-color: rgb(29, 3, 54);
            margin-top: 20px;
            border-radius: 10px;
        }
        .full-news-card h4 {
            color: white;
        }
        .full-news-card p {
            color: white;
            text-align: justify;
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
     $id = $_GET['id'];
     $qry = "SELECT * FROM news_details WHERE id = $id";
     $res = $conn->query($qry);
     if($res->num_rows > 0){
        $ns = $res -> fetch_assoc();
        $userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
        ?>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0">
                    <img src="<?php echo "images/".$ns['picture']; ?>" class="card-img-top imgborder" alt="Image">
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="full-news-card text-center">
                    <h4 class="card-title text-white"><b><?php echo $ns['title']; ?></b></h4>
                    <p class="card-text mt-4 text-light" style="text-align: justify;"><?php echo $ns['descn']; ?>. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum, neque. Rem deserunt incidunt omnis facere corporis et doloremque accusantium praesentium voluptatibus, ipsam quia quae fugiat esse dolorem quas aperiam sit quam. Dolor quo quia eius placeat ullam, reiciendis ex quod? Distinctio cupiditate culpa, ullam doloremque repellendus architecto sunt. Omnis necessitatibus asperiores quis nam delectus quia debitis, fugit labore quae dolorem ratione odit nobis harum fuga quisquam, repudiandae similique, velit illo in numquam? Dicta est ad impedit quisquam officia error officiis, nulla, inventore eius eum illum laudantium, fuga ducimus. At nobis repellat quisquam atque tenetur quibusdam, ea culpa nulla nesciunt asperiores?</p>
                    <?php
                        // Checking if the user is an admin 
                        if ($userRole === 'admin') {
                    ?>
                    <a href="edit.php?id=<?php echo $ns['id'];?>" class="btn mt-4 editbtn text-light fw-bold px-4">EDIT</a>
                    <?php
                        }
                    ?>
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
