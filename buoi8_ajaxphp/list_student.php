<?php

//thuc thi ket noi csdl va lay ra thong tin tat ca sinh vien dang co trong bang students, db: php16
//do noi goi ajax dang su dung phuong thuc post thi file  .php nay cung se bat dc du lieu gui tu ajax len thong qua mang $_POST tuong ung
echo "<pre>";
print_r($_GET);
echo "</pre>";
//ket noi csdl su dung mysqli

const DB_HOST = "localhost";
const USER_NAME = "root";
const PASSWORD = "";
const DB_NAME = 'buoi7';
const DB_PORT = 3306;

$connection  = mysqli_connect(DB_HOST, USER_NAME, PASSWORD, DB_NAME, DB_PORT);

if (!$connection) {
    die("loi ket noi: " . mysqli_connect_error());
}
echo " ket noi thanh cong";
//tao truy van select
$sql_select_all = "select * from students";
//thuc thi truy van
$result_all = mysqli_query($connection, $sql_select_all);
$students = [];
if (mysqli_num_rows($result_all) > 0) {
    $students = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
}
?>
<table border="1" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
    </tr>
    <?php foreach ($students as $student) : ?>
    <tr>
        <td><?php echo $student['id']; ?></td>
        <td><?php echo $student['name']; ?></td>
        <td><?php echo $student['age']; ?></td>
    </tr>

    <?php endforeach; ?>

</table>