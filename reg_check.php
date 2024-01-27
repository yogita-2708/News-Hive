<?php
require_once "db/db-connect.php";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (!empty($username) && !empty($email) && !empty($pass)) {
        $role = 'user';

        if (strtolower($email) === 'admin27@gmail.com') {
            $role = 'admin';
        }

        $qry = "INSERT INTO register (username, email, pass, role) VALUES ('$username', '$email', '$pass', '$role')";
        $res = $conn->query($qry);

        if ($res) {
            echo "One record inserted";
            header("location:login.php");
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    }
}
?>
