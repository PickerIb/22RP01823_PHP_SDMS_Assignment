<?php
session_start();
if(!isset($_SESSION['admin_name'])){
    header('location:index.php');
}
session_destroy();
header('location:index.php');
?>