<?php
session_start();
include "connection.php";
$status = $conn->query("SELECT * FROM user WHERE loggedin = 2");
$status = mysqli_fetch_assoc($status);
if ($status['loggedin'] != 2) {
    header('location:LOGIN.php');
}
$username=$status['user_name'];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $cost = $_POST['cost'];
    $food_type = $_POST['food_type'];
    $desc = $_POST['description'];
    $id = $_POST['id'];
  
    $conn->query("UPDATE food SET name = '$name' WHERE food_id = '$id'");
    $conn->query("UPDATE food SET cost = '$cost' WHERE food_id = '$id'");
    $conn->query("UPDATE food SET food_type = '$food_type' WHERE food_id = '$id'");
    if($desc!=NULL)   {$conn->query("UPDATE food SET food_desc = '$desc' WHERE food_id = '$id'");}
 
    $result = mysqli_query($conn, $query);
        header('location:update2.php');
        header("Refresh:0");
}
if(isset($_POST['e'])){

$id = $_POST['id'];
    $filename = $_FILES['i']['name'];
    $imgt = $_FILES['i']['tmp_name'];
    $folder = "images/" . $filename;
    $quer = "Update food set food_image='$folder' where food_id='$id'";
    $result = mysqli_query($conn, $quer);
    move_uploaded_file($imgt, $folder);
}

$result = mysqli_query($conn, "SELECT * FROM food WHERE food_id='" . $_GET['food_id'] . "'");
$row = mysqli_fetch_array($result);
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
      margin-top:10%;
    }
    .menu{
    /* display: auto; */
    flex:100%;
    width: 100%;
margin-left: 0px !important;
    height: 200px;
    /* margin-top: 20px; */
    }

    /* label{
        font-size: 14px;
        margin-left: 10px;
        line-height: 2px;
       
    } */
    img{
        width: 200px;
        height: 200px;
    margin-left:10px;
    }
  
    input[type=submit]{
       width: 120px;
       margin-left:-10px;
    }
}
    </style>

</head>

<body>
    <div class="topnav topnav1">

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
        <form method="post" action="" enctype='multipart/form-data'>
            <div class="menu" style="display:flex;">
                <div style="width:300px; height:250px;">
                    <?php
                    $image = $row['food_image'];
                    $image_src = $image;
                    ?>
                    <img height=200px width=200px src='<?php echo $image_src  ?>'>
                </div>
                <div class="row">
                    <input type="file" value="" name="i" />
                    <input type="submit" name="e" value="Upload Image"/>

                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>&nbsp;Food id:</label>
                </div>
                <div class="col-75">
                    <input name="id" type="text" value="<?php echo $row['food_id'] ?>" readonly>
                </div>

            </div>
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


            <input type="submit" name="submit" value="Update" />
    </div>
    </div>
    </form>
    </div>

</body>

</html>