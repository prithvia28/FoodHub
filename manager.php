<?php
session_start();
include "connection.php";
$status = $conn->query("SELECT * FROM user WHERE loggedin = 3");
$status = mysqli_fetch_assoc($status);
if ($status['loggedin'] != 3) {
  header('location:LOGIN.php');
}
// $name=$status['user_name'];
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager</title>
  <link href="home.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    // hiding whole page remaining
    $(document).ready(function() {
      $('#orders').click(function() {
        $('#ajax-content').load("orders.php");
        $('#container').hide();
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#ready_orders').click(function() {
        $('#ajax-content').load("orders_ready.php");
        $('#container').hide();
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#wallet').click(function() {
        $('#ajax-content').load("wallet.php");
        $('#container').hide();
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#menu_status').click(function() {
        $('#ajax-content').load("update_menu_status.php");
        $('#container').hide();
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#profile1').click(function() {
        $('#ajax-content').load("profile1.php");
        $('#container').hide();
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#feedback').click(function() {
        $('#ajax-content').load("manfeed.php");
        $('#container').hide();
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#deliver').click(function() {
        $('#ajax-content').load("deliver_picked.php");
        $('#container').hide();
      });
    });
  </script>
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

    .sidebar h1 {
      display: block;
      color: white;
      padding: 16px;
      text-decoration: none;
    }

    .sidebar h1.active {
      background-color: #D1EAE2;
      color: white;
    }

    .sidebar h1:hover:not(.active) {
      background-color: #D1EAE2;
      color: black;
    }

    .sidebar h2 {
      display: block;
      color: white;
      padding: 16px;
      text-decoration: none;
    }

    .sidebar h2.active {
      background-color: #D1EAE2;
      color: white;
    }

    .sidebar h2:hover:not(.active) {
      background-color: #D1EAE2;
      color: black;
    }

    .sidebar h3 {
      display: block;
      color: white;
      padding: 16px;
      text-decoration: none;
    }

    .sidebar h3.active {
      background-color: #D1EAE2;
      color: white;
    }

    .sidebar h3:hover:not(.active) {
      background-color: #D1EAE2;
      color: black;
    }

    .sidebar h4 {
      display: block;
      color: white;
      padding: 16px;
      text-decoration: none;
    }

    .sidebar h4.active {
      background-color: #D1EAE2;
      color: white;
    }

    .sidebar h4:hover:not(.active) {
      background-color: #D1EAE2;
      color: black;
    }

    .sidebar h5 {
      display: block;
      color: white;
      padding: 16px;
      text-decoration: none;
    }

    .sidebar h5.active {
      background-color: #D1EAE2;
      color: white;
    }

    .sidebar h5:hover:not(.active) {
      background-color: #D1EAE2;
      color: black;
    }

    .container {
      margin-left: 18%;
      margin-top: 5%;
      overflow-y: auto;
    }

    div.content {
      margin-left: 200px;
      padding: 1px 16px;
      height: 1000px;
    }

    .menu1 {
      /* background-color:#008CBA; */
      padding 1px 16px;
      grid-template-columns: 80px auto 60px;
      grid-template-rows: 25% 25% auto;
    }

    .button {
      grid-column-start: 3;
      grid-column-end: span col3-end;
      grid-row-start: 3;
      grid-row-end: span 1;

      background-color: #e7e7e7;
      color: black;
      border: none;
      font-family: "times new roman";
      font-style: "bold";
      padding: 15px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
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

      .sticky {
        position: fixed;
        top: 0;
        width: 100%;
      }
    }
    @media screen and (max-width: 600px) {
        .name{
            margin-top: 50px;
            
        }
        .container{
          margin-left:10px;
        }
      
    }
  </style>

</head>

<body>
  <div class="topnav topnav1">
    <a href="about2.html" style="color:yellow; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size:20px;"><b>Food Hub</b></a>

    <div class="topnav-right position:fixed;">
      <a id="profile1"> <?php echo $status['user_name'] ?></a>
      <a href="logout2.php">Logout</a>
    </div>
  </div>
  <div class="sidebar">
    <h1 class="fa fa-book" id="orders"> Orders</h1>
    <h2 class="fa fa-shopping-cart" id="ready_orders"> Ready orders</h2>
    <h2 class="fa fa-check" id="deliver"> Deliver/Pick orders</h2>
    <h3 class="fa fa-money" id="wallet"> Wallet</h3>
    <h3 class="fa fa-user-o" id="feedback"> Feedback </h3>
    <h5 class="fa fa-book" id="menu_status"> Food availability</h5>

  </div>
  <div id="ajax-content">
  </div>
  <div class="container" id="container"">
    <h3 class='name'>
    <?php
  
    echo "Welcome manager $status[user_name]"

    ?>
    </h3>
  </div>
  <?php
  $conn->close();
  ?>
</body>

</html>