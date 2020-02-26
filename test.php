<?php
session_start();
include "connection.php";


$status = $conn->query("SELECT * FROM user WHERE loggedin = 1");
$status = mysqli_fetch_assoc($status);
$user_id=$status['user_id'];
$result = mysqli_query($conn, "SELECT * FROM food WHERE name='" . $_GET['food_name'] . "'");
$row = mysqli_fetch_array($result);

$id=$row['food_id'];
$name=$row['name'];
$cost=$row['cost'];

$insert_query = $conn->query("INSERT INTO cart(order_id,user_id,item,cost) VALUES('$or','$user_id','$name','$cost')");
header('location:menu.php');
header("Refresh:0");
?>