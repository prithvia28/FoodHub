<?php
session_start();
include "connection.php";
$status = $conn->query("SELECT * FROM user WHERE loggedin = 2");
$status = mysqli_fetch_assoc($status);
if ($status['loggedin'] != 2) {
    header('location:LOGIN.php');
}
$username=$status['user_name'];
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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

        .add {
            margin-left: 18%;
            margin-top: 5%;
            /* background-color: #D1EAE2; */
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
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
   h2{
       margin-left: 0%;
       margin-top: 70px;  
    }
    .container {
      width: 100%;
      margin-left: 0px !important;
    }
    .menu{
    /* display: auto; */
    flex:100%;
    width: 100%;
margin-left: 0px !important;
    height: 200px;
    /* margin-top: 20px; */
    }
  
    .menu1{
      height:250px;
    }
    label{
        font-size: 14px;
        margin-left: 10px;
        line-height: 2px;
       
    }
    img{
        width: 200px;
        height: 200px;
    margin-left:10px;
    }
    .custom{
       display: none;
    }
    input[type=submit]{
       width: 80px;
    }
}
    </style>

</head>

<body>
    <div class="topnav topnav1">
    <a href ="#about" style="color:yellow; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size:20px;"><b>Food Hub</b></a>
        
        <div class="topnav-right">
        <a href="profile2.php"><?php echo $username ?></a>
            <a href="logout1.php">Logout</a>
        </div>
    </div>
    <div class="sidebar">
        <a class="fa fa-book" href="update2.php"> Update Menu</a>
        <a class="fa fa-plus" href="http://localhost/New%20folder/add.php"> Add</a>
        <a class="fa fa-envelope-o" href="adminfeed.php"> Feedback</a>
        
    </div>



    <div class="container add">
    <h2>Hello <?php echo $status['user_name'] ?>! Welcome to Food Hub!</h2>
        <?php

        $sql = "select * from food ";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <div class="menu1" style="display:flex;background-color:  #ffff66;">
                <div class='menu' style="width:300px; height:300px; margin-top:30px; margin-left:20px;">
                    <?php
                        $id = $row['food_id'];
                        
                        $image = $row['food_image'];
                        $image_src = $image;
                        ?>
                    <img height=250px width=250px src='<?php echo $image_src  ?>'>
                </div>

                <div class='menu' style="width:600px; height:350px;">


                    <form method="post" action="" enctype='multipart/form-data'>
                    <div class="row">
                            <div class="col-25">
                                <label><b>&nbsp;Food id:</b></label>
                            </div>
                            <div class="col-75">
                                <label><?php echo $row['food_id'] ?></label>
                            </div>
                            
                        </div>    
                    <div class="row">
                            <div class="col-25">
                                <label><b>&nbsp;Name:</b></label>
                            </div>
                            <div class="col-75">
                            <label><?php echo $row['name'] ?></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label><b>&nbsp;Type:</b></label>
                            </div>
                            <div class="col-75">
                            <label><?php echo $row['food_type'] ?></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label><b>&nbsp;Cost:</b></label>
                            </div>
                            <div class="col-75">
                            <label><?php echo $row['cost'] ?></label>
                            </div>
                        </div>

                        <div class="row custom">
                            <div class="col-25">
                                <label><b>&nbsp;Description:</b></label>
                            </div>
                            <div class="col-75">
                            <label><?php echo $row['food_desc'] ?></label>
                            </div>
                        </div>

                    </form>
                </div>
                <div class='menu2' style="width:200px; height:300px;">
                <a href="update3.php?food_id=<?php echo $row["food_id"]; ?>"><input style="margin-top:50px;margin-right:50px" type="submit" value="Update" /></a>
                  
                </div>
            </div>
        <?php
  
        }
        $conn->close();
        ?>


    </div>
</body>

</html>