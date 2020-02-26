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
    <title>Menu</title>
    <link href="home.css" rel="stylesheet" media="all">
    <link href="add.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
     body {
    margin: 0;
    font-family: "Lato", sans-serif;
  }

  .container1{
      margin-left:18%;
      margin-top: 7%;
  }
  
  div.content {
    margin-left: 200px;
    padding: 1px 16px;
    height: 1000px;
  }
  

  .button1 {
 
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
       
       .container1{
     width: 100%;
     margin-left: 2px !important;
     margin-top: 20%;
    
   }
   .menu{
 flex:100%;
   width: 100%;
   
   }
   .test{
    height: 100%;
    width: 100%;
   }
   }

</style>
    
</head>
    <body>
        <div class="container1"> 
        
         <?php

                $sql = "select * from food ";
                $result = mysqli_query($conn,$sql);
               
                while($row=mysqli_fetch_assoc($result))
			    {
                    $avail=$row['availability'];
            ?>
        <div class='menu' style="display:flex; height:250px;">
            <div>
            </div>
            <div class='test' style="width:300px; height:300px;">
            <?php
                $image = $row['food_image'];
                $image_src = $image;
            ?>
            <img height=200px width=200px src='<?php echo $image_src  ?>' >
            </div>

            <div class='test' style="width:500px; height:300px;">
                <h4><?php echo $row['name'] ?></h4>
                <h4><?php echo $row['food_desc'] ?></h4>
                <h4>Rs<?php echo $row['cost'] ?></h4>
            </div>

            <div  class='test' style="width:200px; height:300px;">
            <?php
            if($avail==1)
            {
                ?>
                <label style="margin-left:100px;">Currently available</label>
                <a href="menustatusupdate0.php?food_id=<?php echo $row['food_id'];?>"><input type=submit class=button1 value="Not Available"></a>
                <?php
            }
            else{
                ?>
                <label> Currently not available </label>
  <a href="menustatusupdate1.php?food_id=<?php echo $row['food_id'];?>"><input type=submit class=button1 value="Available"></a>
<?php
            }?>
            </div>
            <div style="width:10px; height:330px">
          </div>
        </div>
                <?php
                }
                ?>
   </div>
<?php 
        $conn -> close();
      ?>
	</body>
</html>