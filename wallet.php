<?php
session_start();   
include "connection.php";
$status = $conn->query("SELECT * FROM user WHERE loggedin = 3");
$status = mysqli_fetch_assoc($status);
if ($status['loggedin'] != 3) {
    header('location:LOGIN.php');
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wallet</title>
  <link href="add.css" rel="stylesheet" media="all">
  <link href="home.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
   .add {
      margin-left: 25%;
      margin-top: 10%;
      width:700px;
    }
    @media screen and (max-width: 600px) {
       
       .container{
     width: 100%;
     margin-left: 0px !important;
   }
   .menu{
 
   width: 100%;
   }
   input[type=submit]{
       width: 60px;
       margin-left: 30%;
   }
   }
</style>
</head>
<body>
    
        <?php
        if(isset($_POST['e'])){
            $input_id=$_POST['user_id'];
            $sql = "select * from user where email='$input_id'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            $wallet=$row['wallet']; 
            $newwallet=$_POST['amount'];
            $total=$wallet+ $newwallet;
            
            $sql1="UPDATE user SET wallet=$total where email='$input_id'";
            $result1=mysqli_query($conn,$sql1);
            header('location:manager.php');
            header('Refresh:0');
        }
        ?>

        <div class="container add">
            <form method="post" action="wallet.php" enctype='multipart/form-data'>
            

            <div class="row">
                <div class="col-25">
                <label>Email:</label>
                </div>
                <div class="col-75">
                <input name="user_id" type="text" min=1 value="">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                <label>Amount:</label>
                </div>
                <div class="col-75">
                <input name="amount" type="number" min=1 value="">
                </div>
            </div>

            <div class="row">
                <input type="submit" name="e" value="Add"/>
            </div>
            </form>
        </div>
    </body>
</html>