<?php

$error = '';
$result = '';


echo "<pre>";
print_r($_POST);
echo "</pre>";

if (isset($_POST['submit'])) {
    $name = $_POST['ten'];

    if (empty($name)) {
        $error = 'ten khong duoc de trong';
    } else 
    if (strlen($name) < 6) {
        $error = 'ten phai dai hon 6 ki tu';
    }
    if (empty($error)) {
        $result = $name;
    }
    // else {
    //     $error = 'nhap ten ko dung';
    // }
}
?>
<h3>
    <?php echo $result; ?>

</h3>
<h3>
    <?php echo $error; ?>

</h3>




<form action="" method="post">
    NHAP TEN CUA BAN <input type="text" name="ten" value="" />
    <br />
    <input type="submit" name="submit" value="Show thong tin" />
</form>