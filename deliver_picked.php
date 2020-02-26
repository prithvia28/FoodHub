<?php
session_start();
include "connection.php";
$status = $conn->query("SELECT * FROM user WHERE loggedin = 3");
$status = mysqli_fetch_assoc($status);
if ($status['loggedin'] != 3) {
    header('location:LOGIN.php');
}
$user_id = $status['user_id'];


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

    <div class="container">
    <?php
    $sql1 = "SELECT count(order_id) as count1 from orders where order_status='4'";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_array($result1);
    $count = $row['count1'];
    $x = 0;
    if ($count == $x) {
        ?>
        <h1>No new orders ready</h1>
    <?php
    }
    else{
    ?>
    
        <h1>Ready orders</h1>
        <?php

        $sql = "select * from orders where order_status='4' order by order_id desc";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $order_id = $row['order_id'];
            $type = $row['order_type'];
            $id = $row['user_id'];
            $query1 = "select * from user where user_id='$id'";
            $res1 = mysqli_query($conn, $query1);
            $res2 = mysqli_fetch_assoc($res1);
            ?>

            <div class="menu" style="display:flex; ">
             

                <div style="width:500px; height:300px;background-color: #ffff66">
                    <h4>Order id: <?php echo $row['order_id'] ?></h4>
                    <h4>User name: <?php echo $res2['user_name'] ?></h4>
                    <h4>Total: Rs<?php echo $row['total'] ?></h4>
                    <h4>Order_type: <?php echo $row['order_type'] ?></h4>
                    <?php
                        if ($type == 'deliver') {
                            ?>
                        <h4>Address: <?php echo $row['address'] ?></h4>
                    <?php
                        }
                        ?>
                    <h4>Payment: <?php echo $row['pay'] ?></h4>
                </div>

                <div style="width:500px; height:300px;background-color: #ffff66">
                    <h4> Cart Details</h4>
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
                <div style="width:300px; height:300px ;background-color: #ffff66">
                <?php
                        if ($type == 'deliver') {
                            ?>
                            <a href="update_order3.php?order_id=<?php echo $row["order_id"]; ?>"><input style="margin-top:10px;" type=submit class=button value="Deliered"></a>
               
                    <?php
                        }
                        else{
                        ?>
                         <a href="update_order3.php?order_id=<?php echo $row["order_id"]; ?>"><input style="margin-top:10px;" type=submit class=button value="Picked"></a>
               
                        <?php
                        }
                        ?>
               
                </div>
                <div style="width:100px; height:330px">

                </div>
            </div>
        <?php
        }
    }
        ?>
    </div>
   
</body>

</html>