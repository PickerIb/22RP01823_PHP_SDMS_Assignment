<?php
session_start();
if(!isset($_SESSION['admin_name'])){
    header('location:index.php');
    exit(); 
}

include('connect.php');
if(isset($_GET['student_id'])){
    $student_id=$_GET['student_id'];
    $delete=mysqli_query($conn,"DELETE FROM student WHERE student_id='$student_id'");
    if($delete){
        ?>
                 <script>
                    alert("Data Removed Successful!");
                    window.location.href="viewstudent.php";
                </script>
        
                <?php
            } else {
                ?>
                <script>
                    alert("Opps Failed to Remove Student!");
                    window.location.href="addstudent.php";
                </script>
                <?php
            }



}
?>