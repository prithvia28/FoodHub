<?php
session_start();
include "connection.php";
// include "addtocart.php";
$status = $conn->query("SELECT * FROM user WHERE loggedin = 1");
$status = mysqli_fetch_assoc($status);
if ($status['loggedin'] != 1) {
    header('location:LOGIN.php');
}
$user_id=$status['user_id'];
$username = $status['user_name'];
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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

        .container1 {
            margin-left: 18%;
            margin-top: 2%;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        .cart {
            color: black;
            position: absolute;
            top: 100px;
            left: 300px;
    
            border-color: #2B7A78;
        }
        .cart1{
            top:300px;
            width:600px;
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
            table {
              margin-top: 20%;
            }
            .cart{
               margin-left: -280px;
            }
        }
        
        
    </style>

</head>

<body>
    <div class="topnav topnav1">
    <a href ="about1.html" style="color:yellow; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size:20px;"><b>Food Hub</b></a>
        
        <div class="topnav-right">
        <a href="profile.php"><?php echo $username ?></a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="sidebar">
    <a class="fa fa-book" href="menu.php">   Menu</a>
    <!-- <a class="fa fa-search" href="search.php"> Search</a> -->
            <a class="fa fa-shopping-cart" href="cart.php">   Cart</a>
            <a class="fa fa-list" href="userorder.php"> Orders</a>
            <a class="fa fa-envelope-o" href="#feedback">   Feedback</a>
            <a class="fa fa-money" href="userwallet.php">   Wallet</a>
        
    </div>

    <div class="container1" style="display:flex">
<div style="width:2400px;">
        <table class="cart" border="2px" style="width: 700px; line-height: 30px; ">
            <tr>
                <th colspan="6">
                    <h2>Cart</h2>
                </th>
            </tr>
            <!-- <th>Order_id</th> -->
            <th>Name</th>
            <th>Quantity</th>
            <th>Cost</th>
            <th>Total</th>
            <th>Delete</th>
            
            

            <?php
            $query = "select * from cart where user_id=$user_id and stat='0'";
            $result = mysqli_query($conn, $query);
           $tot=0; 
            while ($rows = mysqli_fetch_assoc($result)) {
                $quantity=$rows['quantity'];
                $cost=$rows['cost'];
                $total=$quantity*$cost;
                ?>
                <tr>
                    <!-- <td><?php echo $rows['order_id'] ?></td> -->
                    <td><?php echo $rows['item'] ?></td>
                    <td><?php echo $rows['quantity'] ?></td>
                    <!-- <td><input name='update' type="number" value="<?php echo $rows['quantity'] ?>" style="width: 80px;">
                    <?php $quant=$_POST['update'];
                    $sr_no=$rows["sr_no"];?>
                    <a href='quant.php?quant=".urlencode($quant).&sr_no=".urlencode($sr_no)."'><input type="submit" value="Update" style="align:center" /></a></td>
                 -->
                    <td><?php echo $rows['cost'] ?></td>
                    <td><?php echo $total ?></td>
                    <td><a href="delete.php?sr_no=<?php echo $rows["sr_no"]; ?>"><input type="submit" value="Delete" style="align:center" /></a></td>
                    <?php 
                    $tot=$total+$tot; ?>
                </tr>

            <?php
            }
            ?>
            <tr>
                <td colspan="6" align="right"><b>Total: </b><?php echo $tot ?> Rs</td>
            </tr>


        </table>
        </div>
         
    </div>
    <div style=" margin-right: 300px;margin-top:500px;">
    <a href="proceed.php?tot=<?php echo $tot ?>"><input type="submit" class="button" value="Proceed" /></a>
        </div>
    
<?php
if(isset($_POST['place'])){
    $type=$_POST['type'];
    $address=$_POST['address'];
    $pay=$_POST['pay'];

}
?>
</body>

</html>