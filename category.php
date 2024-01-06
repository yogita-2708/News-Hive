<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .category-card {
            margin-bottom: 20px;
        }

        .category-title {
            color: #495057;
        }

        .btn.add-category {
            background-color: #802be2;
        }
        .btn.add-category:hover {
            background-color: rgba(255, 255, 255, 0.1); 
            border-color: white; 
            color: white;
        }
    </style>
</head>
<body>
    <?php 
    include_once "include/navbar.php"; 
    ?>
    <div class="container mt-4">
        <h1 class="text-center text-light">News Categories</h1>
        <div class="col-md-12 mt-5">
            <a href="add_category.php" class="btn btn-outline-light fw-bold text-light add-category">Add Category</a>
        </div>
        <div class="row mt-5">
            <?php
            require_once "db/db-connect.php";
            $categories_query = "SELECT * FROM category";
            $categories_result = $conn->query($categories_query);

            while ($row = $categories_result->fetch_assoc()) {
                $category_name = $row['catname'];
                // $category_descn = $row['catdescn'];
                $category_descn = isset($row['catdescn']) ? $row['catdescn'] : "No description available";
                ?>
                <div class="col-md-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <h5 class="card-title category-title"><?php echo $category_name; ?></h5>
                            <p class="card-text"><?php echo $category_descn;?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include_once "include/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
