<?php
if(isset($_POST['edit'])){
    require_once "db\db-connect.php";

    $id = $_POST['id'];
    $title = $_POST['title'];
    $descn = $_POST['descn'];
    $date = $_POST['date'];
    $category = $_POST['category'];
    $picture = $_FILES['picture'];
    $path = 'images';
    $file = $picture['name'];
    $c_path = $path."/".$file;
    if(move_uploaded_file($picture['tmp_name'],$c_path)){
        $qry = "UPDATE news_details set title='$title', descn='$descn', date='$date', category='$category', picture='$file' WHERE id=$id";
        if($conn->query($qry)){
            header("location:dashboard.php?update=ok");
        }else{
            header("location:dashboard.php?update=error");
        }
        $conn->close();
    } else {
        echo "Error ".$picture['error'];
    }    
}
?>