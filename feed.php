<?php
session_start();
include "connection.php";
// include "addtocart.php";
$status = $conn->query("SELECT * FROM user WHERE loggedin = 1");
$status = mysqli_fetch_assoc($status);
if ($status['loggedin'] != 1) {
    header('location:LOGIN.php');
}
$user_id = $status['user_id'];
$username = $status['user_name'];
$wallet = $status['wallet'];
$result = mysqli_query($conn, "SELECT * FROM orders WHERE order_id='" . $_GET['order_id'] . "'");
$row = mysqli_fetch_array($result);
$order=$row['order_id'];

if(isset($_POST['submit']))
{
    $feed=$_POST['feedback'];
    $query="INSERT INTO feedback(order_id,user_id,description) VALUES('$order','$user_id','$feed')";
    $result = mysqli_query($conn, $query);
    header('location:userfeedback.php');
header("Refresh:0");
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="add.css" rel="stylesheet" media="all">
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
            background-color: #4CAF50;
            color: white;
        }

        .sidebar a:hover:not(.active) {
            background-color: #D1EAE2;
            color: black;
        }

        .container1 {
            margin-left: 18%;
            margin-top: 2%;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        .cart {
            color: black;
            position: absolute;
            top: 100px;
            left: 300px;

            border-color: #2B7A78;
        }

        .cart1 {
            top: 300px;
            width: 600px;
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
    </style>

</head>

<body>
    <div class="topnav topnav1">

        <div class="topnav-right">
            <a href="profile.php"><?php echo $username ?></a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="sidebar">
        <a class="fa fa-book" href="menu.php"> Menu</a>
        <!-- <a class="fa fa-search" href="search.php"> Search</a> -->
        <a class="fa fa-shopping-cart" href="cart.php"> Cart</a>
        <a class="fa fa-list" href="userorder.php"> Orders</a>
        <a class="fa fa-envelope-o" href="userfeedback.php"> Feedback</a>
        <a class="fa fa-money" href="userwallet.php"> Wallet</a>

    </div>

    <div class="container1" style="display:flex">
        <?php
        $query = "select * from cart where user_id=$user_id";
        $result = mysqli_query($conn, $query);
        ?>
        <div style=" margin-top:100px">
            <h4> Order id: <?php echo $order ?></h4>
            <form method="POST">
              
                <h4>Feedback: </h4>
                <textarea cols="50" name="feedback" rows="5"></textarea>
                <br>
              
        </div>

    </div>

    <div style=" margin-right: 300px;">
        <input type="submit" name='submit' value="Submit" /></a>
    </div>
    </form>

</body>

</html>