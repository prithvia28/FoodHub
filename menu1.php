<?php
session_start();   
include "connection.php";

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

</style>
    
</head>
    <body>
        <div class="topnav topnav1">

            <div class="topnav-right">
            <a href="home.html">Home</a>
                <!-- <a href="logout.php">Logout</a> -->
            </div>
        </div>
        <div class="sidebar">
            <a class="fa fa-book" href="menu.php">   Menu</a>
            
        </div>
        <?php


?>
      <div class="container"> 
         <?php

                $sql = "select * from food where availability='1' ";
                $result = mysqli_query($conn,$sql);
               
                while($row=mysqli_fetch_assoc($result))
			    {
            ?>

            <div class="menu" style="display:flex;">
            <div style="width:300px; height:250px;">
            <?php
                $image = $row['food_image'];
                $image_src = $image;
            ?>
            <img height=200px width=200px src='<?php echo $image_src  ?>' >
            </div>

            <div style="width:500px; height:250px;">
            <h4><?php echo $row['name'] ?></h4>
            <h4><?php echo $row['food_desc'] ?></h4>
            <h4>Rs<?php echo $row['cost'] ?></h4>
            </div>

            <div style="width:200px; height:250px;">
            <!-- <input style="width:40px;"type="number" name="e" value="1" min="1"/> -->
            <a href=login.php><input type="submit" class="button" value="Add to cart" /></a>
           
            </div>
                </div>
                <?php
                }
                ?> </div>
<?php 
        $conn -> close();
      ?>
	</body>
</html>