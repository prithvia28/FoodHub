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
$result = mysqli_query($conn, "SELECT * FROM cart WHERE sr_no='" . $_GET['sr_no'] . "' and user_id= '$user_id'");
$row = mysqli_fetch_array($result);
$sr=$row['sr_no'];
$query=mysqli_query($conn, "Update cart set quantity='" . $_GET['update'] . "' WHERE sr_no= '$sr'");
header('location:cart.php');
header("Refresh:0");
?>