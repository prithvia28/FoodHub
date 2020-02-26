<?php
global $conn;
global $or1;

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "canteen";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

?>