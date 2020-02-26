<?php
session_start();
include "connection.php";
$status = $conn->query("SELECT * FROM user WHERE loggedin = 1");
$status = mysqli_fetch_assoc($status);
$user_id=$status['user_id'];
$result = mysqli_query($conn, "SELECT * FROM cart WHERE sr_no='" . $_GET['sr_no'] . "'");
$row = mysqli_fetch_array($result);
$sr=$row['sr_no'];

$insert_query = $conn->query("Delete from cart where sr_no='$sr'");
header('location:cart.php');
header("Refresh:0");
?>