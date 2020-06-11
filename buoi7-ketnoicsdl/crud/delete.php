<?php
session_start();
require_once 'database.php';
//thuc hien xoa ban ghi dua theo id bat duoc tu url
//validate id hop le 
$id = $_GET['id'];
//tao truy van xoa
$sql_delete = "delete from students where `id`=$id ";
//thuc thi truy van
$is_delete = mysqli_query($connection,$sql_delete);
if($is_delete){
    $_SESSION['success'] = "xoa ban ghi $id thanh cong";

}
else{
    $_SESSION['error'] = "xoa ban ghi $id that bai";
}
header("Location:list.php");
exit();