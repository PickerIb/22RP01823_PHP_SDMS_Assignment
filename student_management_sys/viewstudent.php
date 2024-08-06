<?php
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:index.php');
    exit(); 
}
$adminname = $_SESSION['admin_name'];

include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.2/bootstrap-5.0.2/dist/css/bootstrap.min.css">
    <title>ALL STUDENTS INFORMATION</title>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4 shadow">
            <legend class="text-center mb-4"><b>ALL STUDENTS WE HAVE IN THE SYSTEM</b></legend>
            <div class="text-center mb-4">
                <h5>STUDENT INFORMATION</h5>
            </div>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>FIRSTNAME</th>
                        <th>LASTNAME</th>
                        <th>REG NUMBER</th>
                        <th>DEPARTMENT</th>
                        <th>MODIFY</th>
                        <th>REMOVE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 1;
                    $retrieve = mysqli_query($conn, "SELECT * FROM student");
                    $count = mysqli_num_rows($retrieve);
                    while ($getdata = mysqli_fetch_array($retrieve)) {
                    ?>
                    <tr>
                        <td><?php echo $n++;?></td>
                        <td><?php echo $getdata['student_fname']?></td>
                        <td><?php echo $getdata['student_lname']?></td>
                        <td><?php echo $getdata['student_reg_number']?></td>
                        <td><?php echo $getdata['student_department']?></td>
                        <td><a class="btn btn-success" href="editstudent.php?student_id=<?php echo $getdata['student_id'];?>">Edit</a></td>
                        <td><a class="btn btn-danger" href="deletestudent.php?student_id=<?php echo $getdata['student_id']?>">Remove</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="text-center">
                <a href="home.php" class="btn btn-dark">BACK</a>
            </div>
        </div>
    </div>
</body>
</html>
