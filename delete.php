<?php
session_start();
if (!isset($_GET['id'])) 
{
    header('location:dashboard.php');
    exit();
}
require_once "db/db-connect.php";
$id = $_GET['id'];
$userRole = $_SESSION['role'];
if ($userRole === 'admin') 
{
    $qry = "DELETE FROM news_details WHERE id=$id";
    if ($conn->query($qry)) {
        header("location:newspage.php?status=ok");
    } else {
        header("location:newspage.php?status=error");
    }
} 
else 
{
    header("location:newspage.php?status=cannot");
}
?>
