<?php
session_start();
include "connection.php";
$status = $conn->query("SELECT * FROM user WHERE loggedin = 1");
$status = mysqli_fetch_assoc($status);
if ($status['loggedin'] != 1) {
    header('location:LOGIN.php');
}
$user_id = $status['user_id'];
$username = $status['user_name'];
$query = "select * from cart where user_id=$user_id and stat='0'";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="home.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0;
            font-family: "Lato", sans-serif;
        }

        .sidebar {
            margin: 0;
            padding: 0;
            top: 60px;
            width: 15%;
            background-color: #17252A;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: #D1EAE2;
            color: white;
        }

        .sidebar a:hover:not(.active) {
            background-color: #D1EAE2;
            color: black;
        }

        .container {
            margin-left: 18%;
            margin-top: 7%;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        .menu1 {
            /* background-color:#008CBA; */
            padding 1px 16px;
            grid-template-columns: 80px auto 60px;
            grid-template-rows: 25% 25% auto;
        }

        .button {

            background-color: #2B7A78;
            color: white;
            border: none;
            font-family: "times new roman";
            font-style: "bold";
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 2px;
        }

        h4 {
            color: #17252A;
            font-size: 20px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-left: 10px;
        }


        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
            @media screen and (max-width: 600px) {
            input[type=submit]{
                margin-top: 10%;

            }
        }
    </style>

</head>

<body>
    <div class="topnav topnav1">
        <a href="about1.html" style="color:yellow; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size:20px;"><b>Food Hub</b></a>

        <div class="topnav-right">

            <a href="profile.php"><?php echo $username ?></a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="sidebar">
        <a class="fa fa-book" href="menu.php"> Menu</a>
        <!-- <a class="fa fa-search" href="search.php"> Search</a> -->
        <a class="fa fa-shopping-cart" href="cart.php"> Cart- <?php echo $count ?> items</a>
        <a class="fa fa-list" href="userorder.php"> Orders</a>
        <a class="fa fa-envelope-o" href="userfeedback.php"> Feedback</a>
        <a class="fa fa-money" href="userwallet.php"> Wallet</a>

    </div>
    <?php


    ?>
    <div class="container">
        <a href="http://localhost/New%20folder/current.php"> <input type="submit" class="button"  value="Current orders"/></a>
        <a href="deliver.php"> <input type="submit" class="button"  value="Past orders"/></a>
    </div>
    <?php
    $conn->close();
    ?>
</body>

</html>