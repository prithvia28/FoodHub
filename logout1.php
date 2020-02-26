<?php
//student-workshops.php

//Connect to database
include("connection.php");

// LOG IN
// $name = $lname = $course = $branch = $class = $rollno = $gender = $dob = $email = $mobileno = $pass = $current_address = $perm_address = $fathername = $fatheremail = $fathermobile = $mothername = $motheremail = $mothermobile = NULL;
// $fullname = NULL;
// $output_query = NULL;

$status = $conn->query("SELECT * FROM user WHERE loggedin = 2");
$status = mysqli_fetch_assoc($status);
if ($status['loggedin'] != 2) {
    header('location:LOGIN.php');
}
$id = $status['user_id'];

    $redirect = $conn->query("UPDATE user SET loggedin = 0 WHERE user_id = '$id'");
   
    // remove all session variables
session_unset();

// destroy the session
session_destroy();
header('location:login.php');
header("Refresh:0");

?>