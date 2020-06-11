<?php
session_start();
//nên dùng hàm require_once để nhúng file
//để đảm bảo khi file ko tồn tại thì sẽ ko thực thi
//code bên dưới
//sau khi nhúng thì đã có thể sử dụng đc biến $connection
require_once 'database.php';

//create.php
//Tạo thư mục crud - Create - Read - Update - Delele
// có cấu trúc như sau:
//             crud
//                /create.php
//                /update.php
//                /list.php
//                /database.php
//Code chức năng thêm mới student đang có 4 trường là
//id, name, age, created_at
//xử lý submit form
$error = '';
echo "<pre>";
print_r($_POST);
echo "</pre>";
//xử lý khi user submit form
if (isset($_POST['submit'])) {
    //gán dữ liệu
    $name = $_POST['name'];
    $age = $_POST['age'];
    //validate form,
    // yêu cầu trường name và age ko đc để trống
    if (empty($name)) {
        $error = 'Name ko đc để trống';
    } else if (empty($age)) {
        $error = 'Age ko đc để trống';
    }
    //xử lý submit form - lưu dữ liệu vào bảng students
    // khi biến error rỗng
    if (empty($error)) {
        //tạo câu truy vấn insert
        $sql_insert =
            "INSERT INTO students(`name`, `age`)
            VALUES ('$name', $age)";
        //thực thi truy vấn
        $is_insert =
            mysqli_query($connection, $sql_insert);
        die($is_insert);
        if ($is_insert) {
            $_SESSION['success'] = 'Thêm mới thành công';
        } else {
            $_SESSION['error'] = 'Thêm mới thất bại';
        }
        header('Location: list.php');
        exit();
    }
}

?>
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<form action="" method="post">
    Name:
    <input type="text" name="name" value="" />
    <br />
    Age:
    <input type="number" name="age" value="" />
    <br />
    <input type="submit" name="submit" value="Create" />
    <input type="reset" value="Reset" />
</form>