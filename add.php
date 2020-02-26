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
  <title>Add</title>
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

    input[type=submit]{
       width: 120px;
       margin-left:-10px;
    }
}
  </style>

</head>

<body>
  <div class="topnav topnav1">
  <a href ="#about1" style="color:yellow; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size:20px;"><b>Food Hub</b></a>
        
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


  <?php

  if(isset($_POST['e'])) {
    $name = $_POST['name'];
    $id = $_POST['food_id'];
    $cost = $_POST['cost'];
    $food_type = $_POST['food_type'];
    $desc = $_POST['description'];

    $pic = $_FILES['i'];
    $filename = $_FILES['i']['name'];
    $imgt = $_FILES['i']['tmp_name'];
    $folder = "images/" . $filename;
    $quer = "insert into food(food_id,name,food_type,food_desc,cost,food_image) values('$id','$name','$food_type','$desc','$cost','$folder')";
    $result = mysqli_query($conn, $quer);
    move_uploaded_file($imgt, $folder);
    
  }

  ?>


  <div class="container add">
    <form method="post" action="" enctype='multipart/form-data'>
      <div class="row">
        <div class="col-25">
          <label>Name:</label>
        </div>
        <div class="col-75">
          <input name="name" type="text" value="">
        </div>
      </div>




      <div class="row">
        <div class="col-25">
          <label>Type:</label>
        </div>
        <div class="col-75">
          <input name="food_type" type="text" value="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Cost:</label>
        </div>
        <div class="col-75">
          <input name="cost" type="number" min=1 value="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label>Description:</label>
        </div>
        <div class="col-75">
          <textarea cols="25" name="description" rows="5"></textarea><br>
        </div>
      </div>


      <div class="row">
      <input type="file" value="" name="i" />
			<input type="submit" name="e" value="Add"/>
      </div>
  </div>
  </form>
  </div>

</body>

</html>