<?php
session_start();
include "connection.php";
$status = $conn->query("SELECT * FROM user WHERE loggedin = 2");
$status = mysqli_fetch_assoc($status);
if ($status['loggedin'] != 2) {
    header('location:LOGIN.php');
}

$roles=$status['roles'];


$name = $status['user_name'];
$id = $status['user_id'];
$email = $status['email'];
$mobileno = $status['phone'];
$pass = $status['pass'];


if (isset($_POST["save_changes"])) {
    //Get form data
    $name1 = $_POST["name"];
    $email1 = $_POST["email"];
    $mobileno1 = $_POST["mobileno"];


    //Update the database
    $conn->query("UPDATE user SET user_name = '$name1' WHERE user_id = '$id'");
    $conn->query("UPDATE user SET email = '$email1' WHERE user_id = '$id'");
    $conn->query("UPDATE user SET phone = '$mobileno1' WHERE user_id = '$id'");


    header("Refresh:0");
}

?>



<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Update Profile</title>
    <link href="home.css" rel="stylesheet" media="all">
    <link href="add.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
     body {
    margin: 0;
    font-family: "Lato", sans-serif;
  }
  
  .sidebar {
    margin: 0;
    padding: 0;
    top:60px;
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
  .container{
      margin-left:18%;
      margin-top: 7%;
  }
  
  div.content {
    margin-left: 200px;
    padding: 1px 16px;
    height: 1000px;
  }
  .menu1{
    /* background-color:#008CBA; */
padding 1px 16px;
grid-template-columns: 80px  auto 60px ;
  grid-template-rows: 25% 25% auto;
  } 

  .button {
 
  background-color:#2B7A78; color: white;
  border: none;
  font-family:"times new roman";
  font-style:"bold";
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
    .sidebar a {float: left;}
    div.content {margin-left: 0;}
  }
  
  @media screen and (max-width: 400px) {
    .sidebar a {
      text-align: center;
      float: none;
    }
  }
  @media screen and (max-width: 600px) {
        input[type=submit]{
            margin-top: 20px;
         width:200px;
        }
        .container{
      width: 100%;
      margin-left: 15px !important;
    }
    
    }

</style>
    
</head>
    <body>
        <div class="topnav topnav1">
        <a href ="#about1" style="color:yellow; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size:20px;"><b>Food Hub</b></a>
        
            <div class="topnav-right">
            <a href="profile2.php"><?php echo $name ?></a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
        <div class="sidebar">
          <?php
          if($roles==0){
          ?>
             <a class="fa fa-book" href="menu.php">   Menu</a>
             <a class="fa fa-search" href="search.php"> Search</a>
            <a class="fa fa-shopping-cart" href="cart.php">   Cart</a>
            <a class="fa fa-list" href="userorder.php"> Orders</a>
            <a class="fa fa-envelope-o" href="userfeedback.php">   Feedback</a>
            <a class="fa fa-money" href="userwallet.php">   Wallet</a>
            <?php
          }
       
          else{
          ?>
          <a class="fa fa-book" href="update2.php"> Update Menu</a>
        <a class="fa fa-plus" href="http://localhost/New%20folder/add.php"> Add</a>
        <a class="fa fa-envelope-o" href="adminfeed.php"> Feedback</a>
        <?php
          }
          ?>
        </div>
        <?php


?>
      <div class="container"> 
        <h4> Your Profile</h4>
        <form id="registerform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="row">

                <div class="col-25">
                    <label>Name:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Email:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="email" placeholder="Email ID" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Phone no:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="mobileno" value="<?php echo $mobileno; ?>">
                </div>
            </div>

            <div class="row">
                <input type="submit" name="save_changes" value="Save Changes"></div>
        </form>
    </div>


</body>

</html>