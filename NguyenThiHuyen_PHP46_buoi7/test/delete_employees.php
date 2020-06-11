<?php
session_start();
require_once "config.php";
$id=$_GET['id'];
$queryDelete="delete from employees where id =$id";
$isDelete=mysqli_query($connection,$queryDelete);
if($isDelete){
    $_SESSION['success']='xoa nhan vien thanh cong';
    header("Location:employees_list.php");
    exit();
}
mysqli_close($connection);
?>