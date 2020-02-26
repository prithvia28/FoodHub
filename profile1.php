<?php
//student-workshops.php

//Connect to database
include("connection.php");


$status = $conn->query("SELECT * FROM user WHERE loggedin = 3");
$status = mysqli_fetch_assoc($status);
if ($status['loggedin'] != 3) {
    header('location:LOGIN.php');
}

   $roles=$status['roles'];
// EDIT PROFILE

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


    header('location:manager.php');
}

// LOG OUT
if (isset($_POST["logout"])) {
    $redirect = $conn->query("UPDATE user SET loggedin = 0 WHERE user_id = '$id'");
    header('location:login.php');
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


 
  }
  @media screen and (max-width: 600px) {
        input[type=submit]{
            margin-top: 30px;
         width:200px;
        }
        .container{
      width: 100%;
      margin-left: 15px !important;
      margin-top:10% !important;
    }
    
    }

</style>
    
</head>
    <body>
     
      <div class="container"> 
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