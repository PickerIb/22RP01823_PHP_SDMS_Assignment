<?php
session_start();
include('connect.php');

if(!isset($_SESSION['admin_name'])){
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
    <title>DATA MODIFICATION</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4 shadow">
            <legend class="text-center mb-4"><b>MODIFY STUDENT DATA IN THE SYSTEM</b></legend>
            <form action="" method="POST">
                <?php
                if(isset($_GET['student_id'])){
                    $student_id = $_GET['student_id'];
                    $alldata = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$student_id'")); 
                    $ustufname = $alldata['student_fname'];
                    $ustulname = $alldata['student_lname'];
                    $ustuRegnbr = $alldata['student_reg_number'];
                    $ustuDept = $alldata['student_department'];
                ?>
                <div class="mb-3">
                    <label for="fname" class="form-label">Student Firstname:</label>
                    <input type="text" name="fname" id="fname" placeholder="Enter student firstname" class="form-control" value="<?php echo $ustufname ?>" required>
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Student Lastname:</label>
                    <input type="text" name="lname" id="lname" placeholder="Enter student lastname" class="form-control" value="<?php echo $ustulname ?>" required>
                </div>
                <div class="mb-3">
                    <label for="regnbr" class="form-label">Student Reg Number:</label>
                    <input type="text" name="regnbr" id="regnbr" placeholder="Enter student Reg Number" class="form-control" value="<?php echo $ustuRegnbr ?>" required>
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Student Department:</label>
                    <select name="department" id="department" class="form-select" required>
                        <option value="<?php echo $ustuDept ?>" selected><?php echo $ustuDept ?></option>
                        <option value="Information Technology">Information Technology (IT)</option>
                        <option value="Mechatronics Technology">Mechatronics Technology (MECH)</option>
                        <option value="Electronics Telecommunication Technology">Electronics Telecommunication Technology (ETT)</option>
                        <option value="Renewable Energy">Renewable Energy (RE)</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <input type="submit" name="edit" value="Save Changes" class="btn btn-success">
                    <a href="viewstudent.php" class="btn btn-dark">BACK</a>
                </div>
                <?php
                }
                ?>
            </form>
        </div>
    </div>
    <script src="bootstrap-5.0.2/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if(isset($_POST['edit'])){
    $stufname = $_POST['fname'];
    $stulname = $_POST['lname'];
    $stuRegnbr = $_POST['regnbr'];
    $stuDept = $_POST['department'];

    $update = mysqli_query($conn, "UPDATE student SET student_fname='$stufname', student_lname='$stulname', student_reg_number='$stuRegnbr', student_department='$stuDept' WHERE student_id='$student_id'");
    if($update){
        echo '<script>
            alert("Data updated successfully!");
            window.location.href="viewstudent.php";
        </script>';
    } else {
        echo '<script>
            alert("Update process failed, try again later!");
            window.location.href="addstudent.php";
        </script>';
    }
}
?>
