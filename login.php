<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];

    $q = "SELECT * FROM `users` WHERE uname='$name' AND phone='$phone'";
  
    if ($rq = mysqli_query($db, $q)) {
        if (mysqli_num_rows($rq) == 1) {
            $_SESSION["userName"] = $name;
            $_SESSION["phone"] = $phone;
            header("location: index.php");
        } else {
            echo "<script>alert('Invalid credentials')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link-Up</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h1>Link-Up</h1>
    <div class="login">
        <h2>Login</h2>
        <form action="" method="post">

            <h3>UserName</h3>
            <input type="text" placeholder="Short Name" name="name">

            <h3>Mobile No:</h3>
            <input type="number" placeholder="with country code" min="1111111" max="999999999999999" name="phone">

            <button>Login</button>
            New User?<a href="register.php">Register here</a>
        </form>
    </div>
</body>
</html>
