<?php
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:index.php');
    exit(); 
}
$adminname=$_SESSION['admin_name'];

include('connect.php');

if(isset($_POST['register'])){
    $stufname = $_POST['fname'];
    $stulname = $_POST['lname'];
    $stuRegnbr = $_POST['regnbr'];
    $stuDept = $_POST['department'];

    $register = mysqli_query($conn, "INSERT INTO student VALUES (NULL, '$stufname', '$stulname', '$stuRegnbr', '$stuDept')");

    if($register){
        echo '<script>
            alert("Registration Successful!");
            window.location.href="viewstudent.php";
        </script>';
    } else {
        echo '<script>
            alert("Registration Failed!");
            window.location.href="addstudent.php";
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.2/bootstrap-5.0.2/dist/css/bootstrap.min.css">
    <title>STUDENT REGISTRATION</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4 shadow">
            <legend class="text-center mb-4"><b>ADD STUDENT IN A SYSTEM</b></legend>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="fname" class="form-label">Student Firstname:</label>
                    <input type="text" name="fname" id="fname" placeholder="Enter student firstname" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Student Lastname:</label>
                    <input type="text" name="lname" id="lname" placeholder="Enter student lastname" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="regnbr" class="form-label">Student Reg Number:</label>
                    <input type="text" name="regnbr" id="regnbr" placeholder="Enter student Reg Number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Student Department:</label>
                    <select name="department" id="department" class="form-select" required>
                        <option value="" disabled selected>Select Department</option>
                        <option value="Information Technology">Information Technology (IT)</option>
                        <option value="Mechatronics Technology">Mechatronics Technology (MECH)</option>
                        <option value="Electronics Telecommunication Technology">Electronics Telecommunication Technology (ETT)</option>
                        <option value="Renewable Energy">Renewable Energy (RE)</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <input type="submit" name="register" value="REGISTER STUDENT" class="btn btn-success">
                    <a href="home.php" class="btn btn-dark">BACK</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
