<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing News</title>
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
        .btn.editnews {
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
        $id = $_GET['id'];
        $qry = "SELECT * FROM news_details WHERE id = $id";
        $res = $conn->query($qry);
        if($res->num_rows > 0){
            $ns = $res -> fetch_assoc();
            // session_start();
            $userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';

            if ($userRole === 'admin') {
                // Fetch available categories
                $categories_query = "SELECT * FROM category";
                $categories_result = $conn->query($categories_query);
                $categories = [];

                if ($categories_result->num_rows > 0) {
                    while ($row = $categories_result->fetch_assoc()) {
                        $categories[] = $row['catname'];
                    }
                }
        ?>

    <div class="container mt-4">
        <h1 class="text-center">Edit News</h1>
        <form action="update_news.php" method="post" enctype="multipart/form-data" name="categoryform" onsubmit="return validateform()" class="mt-4 form-container">
        <input type="hidden" name="id" value="<?php echo $ns['id'] ?>"><br>
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" placeholder="Type Title..." name="title" value="<?php echo $ns['title']; ?>" class="form-control" id="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" placeholder="Description..." rows="5" name="descn" id="description" required><?php echo $ns['descn']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date:</label>
                <input type="date" name="date" value="<?php echo $ns['date']; ?>" class="form-control" id="date" required>
            </div>

            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail:</label>
                <input type="file" name="picture" value="<?php echo $ns['picture']; ?>" class="form-control" id="thumbnail" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select class="form-control" name="category" id="category" required>
                    <option value="">Select Category</option>
                    <?php
                    foreach ($categories as $category) {
                        echo "<option value='$category' " . ($category == $row['catname'] ? 'selected' : '') . ">$category</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-1 mt-5 text-center">
                <input type="submit" name="edit" class="btn btn-outline-light fw-bold editnews px-4" value="UPDATE">
            </div>
        </form>

        <script>
            function validateform() {
                var x = document.forms['categoryform']['title'].value;
                var y = document.forms['categoryform']['descn'].value;
                var z = document.forms['categoryform']['date'].value;
                var w = document.forms['categoryform']['category'].value;

                if (x=="") {
                    alert('Title Must Be Filled Out !');
                    return false;
                }
                if (y=="") {
                    alert('Description Must Be Filled Out !');
                    return false;
                }
                if (y.length<100) {
                    alert('Description Atleast 100 character !');
                    return false;
                }
                if(w=="") {
                    alert('Please select a category !');
                    return false;
                }
                if(z=="") {
                    alert('Please fill out all required details !');
                    return false;
                }
            }
        </script>
    </div>

    <?php
        } 
    }
        include_once "include/footer.php";
    ?>
</body>
</html>
