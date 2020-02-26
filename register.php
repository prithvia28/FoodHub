<?php
//register.php

$emailerror = $passerror = NULL;
$name =  $email = $phone = $pass = $confirmpass = NULL;

if (isset($_POST['register'])) {
    //Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pass = $_POST["pass"];
    $confirmpass = $_POST["confirmpass"];
    if ($confirmpass != $pass) {
        $passerror = "Passwords don't match!";
    } else {
        //Form is valid
        //Connect to database
        include('connection.php');

        $email_query = $conn->query("SELECT * FROM user WHERE email = '$email'");

        if (mysqli_num_rows($email_query) > 0) {
            $emailerror = "Email ID already exists!!";
        } else {

            //Sanitize data
            $name = $conn->real_escape_string($name);
            $email = $conn->real_escape_string($email);
            $phone = $conn->real_escape_string($phone);
            $pass = $conn->real_escape_string($pass);
            $confirmpass = $conn->real_escape_string($confirmpass);




            //Insert into database
            $insert_query = $conn->query("INSERT INTO user(user_name, email, phone,pass) VALUES('$name','$email', '$phone', '$pass')");

            if ($insert_query) {
                header('location:login.php');
            } else {
                echo $conn->error;
            }
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Canteen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="home.css" rel="stylesheet" media="all">
    <link href="add.css" rel="stylesheet" media="all">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        h1{
            margin-top:20px; 
            margin-left:630px;
             color:yellow;
              font-family:Arial, Helvetica, sans-serif;
              text-shadow: 2px 2px black
        }
        @media screen and (max-width: 600px) {
   h1{
       margin-left: 30%;
    }
}
        </style>
</head>

<body background="./food.jpg" ; background-position: center;>
    <header>

        <a href="LOGIN.php" class="buttonlogin" style="float: right;">Login</a>
    </header>


    <h1>REGISTER</h1>

    <!-- REGISTER FORM -->
    <div class="containerreg">
        <form id="registerform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="row">

                <div class="col-25">
                    <label>Name:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Email:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="email" placeholder="Email ID" value="<?php echo $email; ?>" required>
                    <div class="text-center" style="font-family:'Times New Roman', Times, serif; color:red;"><?php echo $emailerror; ?></div>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Phone no:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="phone" maxlength="10" placeholder="Mobile No." value="<?php echo $phone; ?>" required>
                </div>
            </div>

            <div class="row">

                <div class="col-25">
                    <label>Password:</label>
                </div>
                <div class="col-75">
                    <input type="password" name="pass" maxlength="13" placeholder="Password" value="<?php echo $pass; ?>" required>
                </div>
            </div>
            <div class="row">

                <div class="col-25">
                    <label>Confirm password:</label>
                </div>
                <div class="col-75">
                    <input type="password" name="confirmpass" maxlength="13" placeholder="Confirm Password" value="<?php echo $confirmpass; ?>" required>
                    <div class="text-center" style="font-family:'Times New Roman', Times, serif; color:red;"><?php echo $passerror; ?></div>
                </div>
            </div>
            <div class="row">
            <input name="register" type="submit" value="Register"></div>
        </form>
    </div>
</body>