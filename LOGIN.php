<?php
//login.php
include("connection.php");
$email = $password = NULL;
$error = NULL;

if (isset($_POST["login"])) {
    //Get form data
    $email = $_POST["email"];
    $pass = $_POST["password"];

    //Connect to database
    

    //Sanitize data
    $email = $conn->real_escape_string($email);
    $pass = $conn->real_escape_string($pass);

    $query = "SELECT * FROM user WHERE email = '$email' AND pass= '$pass'";
    $result = mysqli_query($conn, $query);
    $rows=mysqli_fetch_assoc($result);
    $id=$rows['roles'];

    if ($id == 0) {
        $redirect = $conn->query("UPDATE user SET loggedin = 1 WHERE email = '$email' AND pass= '$pass'");

        header('location:menu.php');
    } elseif ($id == 1) {
        $redirect = $conn->query("UPDATE user SET loggedin = 2 WHERE email= '$email' AND pass= '$pass'");
        header('location:update2.php');
    } elseif ($id == 2) {
        $redirect = $conn->query("UPDATE user SET loggedin = 3 WHERE email = '$email' AND pass= '$pass'");
        header('location:manager.php');
    } else {
        $error = "Invalid username or password!!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="add.css">
    <link rel="stylesheet" type="text/css" href="home.css">



    <!-- ICONS -->
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
       margin-left: 40%;
    }
}
        </style>
</head>


<body background="./food.jpg" ; background-position: center;>
    <header>
        <a href="register.php" class="buttonlogin" style="float: right;">Sign up</a>
    </header>

    <h1>LOGIN</h1>


    <div class="containerreg">
        <form name="loginform"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return validateForm()">

            <div class="text-center" style="font-family:'Times New Roman', Times, serif; color:red;"><?php echo $error; ?></div>
            <div class="row">
                <div class="col-25">
                    <label>Email:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="email" placeholder="Email ID" value="<?php echo $email; ?>" required>
                    <div class="text-center" style="font-family:'Times New Roman', Times, serif; color:red;"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Password:</label>
                </div>
                <div class="col-75">
                    <input type="password" name="password" id="password" placeholder="Password" maxlength="13" required>
                </div>
            </div>
            <div class="row">

                <input type="submit" name="login" value="Login">
                <div>
                    <div style="margin-top: 30px; color: black;"><a href="register.php">Create an account</a></div>
        </form>
    </div>

    <!-- FORM VALIDATION -->
    <script>
        function validateForm() {
            var emailformat = document.loginform.email.value;
            atpos = emailformat.indexOf("@");
            dotpos = emailformat.lastIndexOf(".");

            if (atpos < 1 || (dotpos - atpos < 2)) {
                alert("Enter a valid email ID!!")
                document.myForm.EMail.focus();
                return false;
            }
            return (true);
        }
    </script>

</body>

</html>