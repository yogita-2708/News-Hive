<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding News</title>
    <style>
        .wholecontainer {
            background-color: rgb(37, 3, 68);
            color: white;
        }
        .form-container {
            border: 2px solid rgb(76, 49, 102);
            border-radius: 10px;
            padding: 20px;
        }
        .form-container:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
        .btn.addnews {
            background-color: #802be2;
            color: white;
        }
        .btn.addnews:hover {
            background-color: rgb(37, 3, 68);
            border-color: white;
            color: white;
        }
    </style>
</head>
<body class="wholecontainer">
    <?php
    include_once "include/navbar.php";
    require_once "db/db-connect.php";
    if(isset($_POST['submit']))
    {  
        $title = $_POST['title'];
        $descn = $_POST['descn'];
        $date = $_POST['date'];
        $category = $_POST['category'];
        $rid = $_SESSION['email'];
        // $rid = isset($_SESSION['email']) ? $_SESSION['email'] : null;
        $picture = $_FILES['picture'];
        $path = 'images';
        $file = $picture['name'];
        $c_path = $path."/".$file;
        if(move_uploaded_file($picture['tmp_name'],$c_path)){
            $qry = "INSERT INTO news_details VALUES (0,'$title','$descn','$date','$category','$file','$rid')";
            $res = $conn->query($qry);

            if($res){
                echo "<div class='alert alert-success' role='alert'>One record inserted</div>";
                header("location:dashboard.php");
            }
            else{
                echo "Error : ".$conn->error;
            }
            $conn->close();
        } else {
            echo "Error ".$picture['error'];
        }
    }
    ?>
    <div class="container mt-4">
        <h1 class="text-center">Add News</h1>
        <form action="" method="post" enctype="multipart/form-data" name="categoryform" onsubmit="return validateform()" class="mt-4 form-container">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" placeholder="Type Title..." name="title" class="form-control" id="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" placeholder="Description..." rows="5" name="descn" id="description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date:</label>
                <input type="date" name="date" class="form-control" id="date" required>
            </div>

            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail:</label>
                <input type="file" name="picture" class="form-control" id="thumbnail" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select class="form-control" name="category" id="category" required>
                    <option value="">Select Category</option>
                    <?php
                    require_once "db/db-connect.php";
                    $categories_query = "SELECT * FROM category";
                    $categories_result = $conn->query($categories_query);
                    while ($row = $categories_result->fetch_assoc()) {
                        echo "<option value='{$row['catname']}'>{$row['catname']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="admin" class="form-label">Email:</label>
                <input type="text" class="form-control" disabled value="<?php echo $_SESSION['email'];?>">
            </div>

            <div class="mb-1 mt-4 text-center">
                <input type="submit" name="submit" class="btn btn-outline-light fw-bold addnews px-4" value="ADD">
            </div>
        </form>

        <script>
            function validateform() {
                let x = document.forms['categoryform']['title'].value;
                let y = document.forms['categoryform']['descn'].value;
                let z = document.forms['categoryform']['date'].value;
                let w = document.forms['categoryform']['category'].value;

                if (x=="") {
                    alert('Title Must Be Filled Out !');
                    return false;
                }
                if (y=="") {
                    alert('Description Must Be Filled Out !');
                    return false;
                }
                if (y.length<100) {
                    alert('Description Must be Atleast 100 character !');
                    return false;
                }
                if(w=="") {
                    alert('Please select a category !');
                    return false;
                }
            }
        </script>
    </div>
    <?php
    include_once "include/footer.php";
    ?>
</body>
</html>
