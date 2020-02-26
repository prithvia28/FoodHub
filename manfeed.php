<?php
session_start();
include "connection.php";
$status = $conn->query("SELECT * FROM user WHERE loggedin = 3");
$status = mysqli_fetch_assoc($status);
if ($status['loggedin'] != 3) {
    header('location:LOGIN.php');
}
$user_id = $status['user_id'];
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
       
       .container{
     width: 100%;
     margin-left: 15px !important;
   }
   .menu{
 
   width: 100%;
   }
   }
    </style>

</head>

<body>
   
    <?php


    ?>
    <div class="container">
        <h1>Feedbacks</h1>
        <?php

        $sql = "select * from feedback order by f_id desc";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $order_id = $row['order_id'];
            $id = $row['user_id'];
            $query1 = "select * from user where user_id='$id'";
            $res1 = mysqli_query($conn, $query1);
            $res2 = mysqli_fetch_assoc($res1);
            
            ?>

            <div class="menu" style="display:flex; ">
                <!-- <div style="width:300px; height:250px;">
           
            </div> -->

                <div style="width:500px; height:250px;background-color: #ffff66">
                    <h4>Order no: <?php echo $row['order_id'] ?></h4>
                    <h4>User id: <?php echo $row['user_id'] ?></h4>
                    <h4>User name: <?php echo $res2['user_name'] ?></h4>
                    <h4>Feedback: <?php echo $row['description'] ?></h4>

                </div>

                <div style="width:500px; height:250px;background-color: #ffff66">

                </div>
                <div style="width:300px; height:250px ;background-color: #ffff66">
                    <h4>Order Details</h4>
                    <?php
                        $query = "select * from cart where order_id='$order_id'";
                        $res = mysqli_query($conn, $query);
                        while ($row2 = mysqli_fetch_assoc($res)) {
                            ?>
                        <h4 style="color:#2B7A78;"><?php echo $row2['item'] ?>: Rs <?php echo $row2['cost'] ?></h4>
                    <?php
                        }
                        ?>
                </div>
                <div style="width:100px; height:280px">

                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <?php
    $conn->close();
    ?>
</body>

</html>