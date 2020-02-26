
<?php
session_start();   
include "connection.php";
?>

<?php
$result = mysqli_query($conn, "SELECT * FROM food WHERE food_id='" . $_GET['food_id'] . "'");
$row = mysqli_fetch_array($result);
$id1=$row['food_id'];
// $result = mysqli_query($conn, "SELECT * FROM food WHERE food_id='$id1'");
// $row = mysqli_fetch_array($result);
// $id=$row['food_id'];

$conn->query("UPDATE food SET availability = 1 WHERE food_id = '$id1'");
$result = mysqli_query($conn, $query);
    header('location:manager.php');
    header('Refresh:0');
?>