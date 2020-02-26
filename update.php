<?php
session_start();
include "connection.php";


if (isset($_POST['e'])) {
    $name = $_POST['name'];
    $cost = $_POST['cost'];
    $food_type = $_POST['food_type'];
    $desc = $_POST['description'];
    $id = $row['food_id'];

    $conn->query("UPDATE food SET name = '$name' WHERE food_id = '$id'");
    $conn->query("UPDATE food SET cost = '$cost' WHERE food_id = '$id'");
    $conn->query("UPDATE food SET food_type = '$food_type' WHERE food_id = '$id'");
    $conn->query("UPDATE food SET desc = '$desc' WHERE food_id = '$id'");
    $result = mysqli_query($conn, $query);
    header("Refresh:0");
}


?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update1</title>
    <link href="home.css" rel="stylesheet" media="all">
    <link href="add.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: "Lato", sans-serif;
        }

        .sidebar {
            margin: 0;
            padding: 0;
            top: 63px;
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
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
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
        <a href="profile.php">Profile</a>
            <a href="login.php">Logout</a>
        </div>
    </div>
    <div class="sidebar">
        <a class="fa fa-book" href="#menu"> Update Menu</a>
        <a class="fa fa-shopping-cart" href="#cart"> Add</a>
        <a class="fa fa-envelope-o" href="#feedback"> Feedback</a>
        <
    </div>

    <div class="container">
        <?php

        $sql = "select * from food ";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['food_id'];
            ?>

            <div class="menu" style="display:flex;">
                <div style="width:300px; height:250px;">
                    <?php
                        $image = $row['food_image'];
                        $image_src = $image;
                        ?>
                    <img height=200px width=200px src='<?php echo $image_src  ?>'>
                </div>

                <div style="width:500px; height:250px;">
                    <h4><?php echo $row['name'] ?></h4>
                    <h4><?php echo $row['food_desc'] ?></h4>
                    <h4>Rs<?php echo $row['cost'] ?></h4>
                </div>

                <div style="width:200px; height:250px;">
                    <button type="button" class="button" data-toggle="modal" data-target="#myModal">Edit</button>
                </div>
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">


                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="" enctype='multipart/form-data'>
                                    <div class="row">
                                        <div class="col-25">
                                            <label>&nbsp;Name:</label>
                                        </div>
                                        <div class="col-75">
                                            <input name="name" type="text" value="<?php echo $row['name'] ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label>&nbsp;Type:</label>
                                        </div>
                                        <div class="col-75">
                                            <input name="food_type" type="text" value="<?php echo $row['food_type'] ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label>&nbsp;Cost:</label>
                                        </div>
                                        <div class="col-75">
                                            <input name="cost" type="number" min=1 value="<?php echo $row['cost'] ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label>&nbsp;Description:</label>
                                        </div>
                                        <div class="col-75">
                                            <textarea cols="25" name="description" placeholder="<?php echo $row['food_desc'] ?>" rows="5"></textarea><br>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="modal-footer">
                                <input type="submit" name="e" value="Confirm" />
                            </div>
                        </div>

                    </div>

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