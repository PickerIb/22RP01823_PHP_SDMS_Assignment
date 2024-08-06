<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header('location:index.php');
    exit();
}
$adminname = $_SESSION['admin_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.2/bootstrap-5.0.2/dist/css/bootstrap.min.css">
    <title>HOMEPAGE</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3 p-3 bg-dark text-white rounded">
            <h1 class="h3">Welcome Admin: <?php echo $adminname; ?></h1>
            <a href="logout.php" class="btn btn-light">LOGOUT</a>
        </div>
        <div class="text-center">
            <h1 class="display-4">STUDENT MANAGEMENT SYSTEM</h1>
            <div class="mt-4">
                <a href="addstudent.php" class="btn btn-success btn-lg mx-2">ADD STUDENT</a>
                <a href="viewstudent.php" class="btn btn-success btn-lg mx-2">VIEW STUDENT</a>
            </div>
        </div>
    </div>
</body>
</html>
