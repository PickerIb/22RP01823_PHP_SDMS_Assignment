<?php
session_start();
include('connect.php');

if(isset($_POST['register'])){


$adminname=$_POST['adminname'];
$adminemail=$_POST['adminemail'];
$adminpassword=$_POST['adminpass'];


$register=mysqli_query($conn,"INSERT into admin values(NULL,'$adminname','$adminemail','$adminpassword')");

if($register){
?>
<script>
    alert("Registration Successful!");
    window.location.href="admin_login.php";
</script>
<?php

}
else{
    ?>
<script>
    alert("Registration Failed!");
    window.location.href="admin_register.php";
    
</script>
    <?php
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.2\bootstrap-5.0.2\dist\css\bootstrap.css">

    <title>REGISTER HERE AS ADMIN</title>
    <style>
        input[type="text"]{
            width:500px;
        }
        input[type="password"]{
            width:500px;
        }
        input[type="email"]{
            width:500px;
        }
    </style>
</head>
<body>
    <fieldset>
        <legend>REGISTER HERE AS ADMIN</legend>
        <form action="" method="POST">
    <label for="">Admin Name:</label> <br>
    <input type="text" name="adminname" placeholder="Enter your name" class="form-control"><br>
    <label for="">Admin Email:</label> <br>
    <input type="email" name="adminemail" placeholder="Enter your email" class="form-control"><br>
    <label for="">Admin Password:</label> <br>
    <input type="password" name="adminpass" placeholder="Enter your password" class="form-control"><br>
    <input type="submit" name="register" value="REGISTER" class="btn btn-success">
    <a href="index.php" class="btn btn-dark">BACK</a>
        </form>
    </fieldset>
</body>
</html>