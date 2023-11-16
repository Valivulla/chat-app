<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];

    $q = "SELECT * FROM `users` WHERE uname='$name' && phone='$phone'";
  
    if ($rq = mysqli_query($db, $q)) {
        if (mysqli_num_rows($rq) == 1) {
            echo "<script>alert('$phone is already taken by another person')</script>";
        } else {
            $insert_query = "INSERT INTO `users`(`uname`, `phone`) VALUES ('$name', '$phone')";
            if ($insert_result = mysqli_query($db, $insert_query)) {
                $_SESSION["userName"] = $name;
                $_SESSION["phone"] = $phone;
                header("location: login.php");
            } else {
                echo "<script>alert('Registration failed')</script>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            
            background-image: url('https://i.gifer.com/KY7j.gif');
            font-family: 'Arial', sans-serif;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
            background-color:white;
            margin-right:10px;
        }

        .register {
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
            padding: 20px;
            width: 300px;
        }

        .register h2 {
            text-align: center;
            color: #333;
        }

        .register p {
            font-size: 14px;
            color: #777;
            text-align: center;
        }

        .register form {
            display: flex;
            flex-direction: column;
        }

        .register form h3 {
            color: #333;
            margin-bottom: 5px;
        }

        .register form input {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .register form button {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .register form button:hover {
            background-color: #2187c6;
        }

        .register a {
            font-size: 14px;
            color: #3498db;
            text-align: center;
            text-decoration: none;
            margin-top: 10px;
        }

        .register a:hover {
            color: #217dbb;
        }
    </style>
</head>
<body>
    <h1>Link-Up</h1>
    <div class="register">
        <h2>Register</h2>
        <form action="" method="post">

            <h3>UserName</h3>
            <input type="text" placeholder="Short Name" name="name">

            <h3>Mobile No:</h3>
            <input type="number" placeholder="with country code" min="1111111" max="999999999999999" name="phone">

            <button>Register</button>
            Already have an account? <a href="login.php">Login here</a>
        </form>
    </div>
</body>
</html>
