<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Category</title>
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
        $catname = $_POST['title'];
        $catdescn = $_POST['descn'];
        // Check if the category name already exists
        $checkQuery = "SELECT * FROM category WHERE catname = '$catname'";
        $checkResult = $conn->query($checkQuery);
        if ($checkResult === false) 
        {
            echo "<div class='alert alert-danger' role='alert'>Error checking category name existence: " . $conn->error . "</div>";
        } 
        else 
        {
            if ($checkResult->num_rows > 0) 
            {
                // echo "<div class='alert alert-dark' role='alert'>Category name has already been taken !!!</div>";
                echo "<script> alert('Category name has already be taken !!')</script>";
                exit();
            } 
            else 
            {
                $qry = "INSERT INTO category (catname, catdescn) VALUES ('$catname', '$catdescn')";
                $res = $conn->query($qry);

                if ($res) {
                    echo "<div class='alert alert-success' role='alert'>Category Added Successfully</div>";
                    // header("location:category.php");
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Please Try Again !!</div>";
                }
            }
        }
        $conn->close();
    } 
    ?>

    <div class="container mt-4">
        <h1 class="text-center">Add Category</h1>
        <form action="" method="post" name="categoryform" onsubmit="return validateform()" class="mt-4 form-container">
            <div class="mb-3">
                <label for="title" class="form-label">Category:</label>
                <input type="text" placeholder="Enter Category Name..." name="title" class="form-control" id="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" placeholder="Enter Category Description..." rows="5" name="descn" id="description"></textarea>
            </div>
            <div class="mb-1 mt-4 text-center">
                <input type="submit" name="submit" class="btn btn-outline-light fw-bold addnews px-4" value="ADD">
            </div>
        </form>

        <script>
            function validateform()
            {
                var x = document.forms['categoryform']['title'].value;
                if (x=="") 
                {
                    alert('Category Must Be Filled Out !');
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
