<?php
//khai bao cac bien chua thong tin loi 
// thong tin thanh cong
$error = '';
$result = '';

//thu debug xem khi chua submit form va submit form r thi mang $_post cos gia tri gi khong
echo "<pre>";
print_r($_POST);
echo "</pre>";

//neu co hanh dong submit form thi moi xu ly
//tuong duong voi mang $_post['name cua nut submit'] da ton tai
if (isset($_POST['submit'])) {
    //tao bien va gan gia tri
    $username = $_POST['username'];
    $password = $_POST['password'];
    //validate du lieu
    //validate username va password ko dc de trong
    //dung ham empty
    if (empty($username) || empty($password)) {
        $error = "username va password khong duoc de trong";
    }
    //username phai co dinh dang email
    else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $error = 'username phai co dinh dang email';
    }
    //validate password co do dai >=6 ky tu
    else if (strlen($password) < 6) {
        $error = "password phai lon hon hoac bang 6 ky tu";
    }
    //xu ly submit form sau khi validate du lieu thanh cong
    //tuong duong error rong
    if (empty($error)) {
        if ($username == 'bonbon@gmail.com' && $password = 1234567) {
            $result = "dang nhap thanh cong";
        } else {
            $error = "sai username hoac password";
        }
    }
}
?>
<!-- hien thi thong bao loi va thong bao thanh cong ra man hinh -->
<h3 style="color: sienna">
    <?php echo $error; ?>
</h3>
<h3 style="color: blue">
    <?php echo $result; ?>
</h3>

<form action="" method="post">
    UserName <input type="text" name="username" value="" />
    <br />
    Password <input type="password" name="password" value="" />
    <br />
    <input type="submit" name="submit" value="login" />
</form>