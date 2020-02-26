<?php
session_start();
include "connection.php";

$status = $conn->query("SELECT * FROM user WHERE loggedin = 1");
$status = mysqli_fetch_assoc($status);
$user_id=$status['user_id'];
// $result = mysqli_query($conn, "SELECT * FROM food WHERE food_id='" . $_GET['food_id'] . "'");
// $row = mysqli_fetch_array($result);
$cart=mysqli_query($conn,"SELECT * FROM cart WHERE user_id=$user_id and stat='0'");
$row1 = mysqli_fetch_array($cart);
$order_id=$row1['order_id'];
$stat=$row1['stat'];
$total= $_GET['tot'];

$insert_query = $conn->query("INSERT INTO orders(order_id,user_id,order_status,stat,total) VALUES('$or1','$user_id','2','0','$total')");
$retreive=$conn->query("Select * from orders where user_id=$user_id and order_status='2' and stat='0'");
$retreive = mysqli_fetch_assoc($retreive);
$ord=$retreive['order_id'];
$insert=mysqli_query($conn,"update cart set order_id='$ord' where user_id='$user_id' and stat='0'");
// $insert=$conn->query("update cart set order_id='$ord' where user_id='$user_id' and stat='0'");
$upd=mysqli_query($conn,"update cart set stat='1' where order_id='$ord'");
$upd1=mysqli_query($conn,"update orders set stat='1' where order_id='$ord'");
$or1=$or1+1;
header('location:payment.php');
header("Refresh:0");
?>