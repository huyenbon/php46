<?php
session_start();
require_once('database.php');
//hien thi chuc nang update student
// chuc nang update la chuc nang ton nhieu cong suc nhat của crud
//phai biet duoc id cua ban ghi can dc update
//update.php?id=1
//lấy giá trị id bắt được tuef url trên
//co 1 bước validate, nếu không truyền tham số id hoặc id ko phải là số, sẽ báo lỗi và chuyển hướng trang sách

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'id khong hop le';
    header('location: list.php');
    exit();
}
$id = $_GET['id'];
//lay thong tin sinh vien dua vao id vua bat duoc va hien thi ra form update
//tao caau truy vaans
$sql_select_one = "select * from students where `id`= $id";
//thuc thi truy van
$result_one = mysqli_query($connection, $sql_select_one);
$student = mysqli_fetch_assoc($result_one);
//xu ly form 
//if(isset) xu ly giong them moi

echo "<pre>";
print_r($student);
echo "</pre>";
?>
<form action="" method="post">
    Name: <input type="text" name="name" <?php echo $student['name']?>/> <br/>
    Age : <input type="number" name="age" <?php echo $student['age']?>/> <br/>
    <input type="submit" value="submit" name="submit"/>

</form>