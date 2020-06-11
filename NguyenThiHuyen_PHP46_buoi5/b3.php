<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

$error = '';
$result = '';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $file_arr = $_FILES['upload'];

    if (empty($username))
        $error = "ten khong dc de trong";
    else if (empty($password)) {
        $error = "password ko dc de trong";
    } else if (empty($email)) {
        $error = "email ko dc de trong";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "truong email phai co dinh dang email";
    } else if ($password != $confirm_password) {
        $error = "Truong confirm password phai giong truong password";
    } else if ($file_arr['error'] == 0) {
        $extension = pathinfo($file_arr['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        $arr_extension = ['jpg', 'png', 'gif', 'jpeg'];
        if (!in_array($extension, $arr_extension)) {
            $error = 'phai upload file dang anh';
        }
    }


    if (empty($error)) {
        $result .= "Name: $username <br/>";
        $result .= "Email: $email <br/>";
        $result .= "Passqword: $password <br/>";
        $result .= "confirm password: $confirm_password <br/>";


        if ($file_arr['error'] == 0) {
            $dir_uploads = __DIR__ . '/uploads';
            if (!file_exists($dir_uploads)) {
                mkdir($dir_uploads);
            }
            $filename = time() . '-' . $file_arr['name'];
            $destination = $dir_uploads . '/' . $filename;
            $is_upload = move_uploaded_file($file_arr['tmp_name'], $destination);
            if ($is_upload) {
                $result .= "<img src='uploads/$filename' height='80px' />";
            }
        }
    }
}




?>

<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<h3 style="color: blue">
    <?php echo $result; ?>
</h3>

<div style="text-align: center; background-color:thistle;">
    <h3>CREATE AN ACCOUNT</h3>
    <form method="POST" enctype="multipart/form-data" action="">
        <p><input type="text" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" name="username"
                placeholder="Username" /> <br /></p>

        <p><input type="text" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" name="email"
                placeholder="Email" /> <br /></p>

        <p><input type="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"
                name="password" placeholder="Password" /> <br /></p>

        <p><input type="password"
                value="<?php echo isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '' ?>"
                name="confirm_password" placeholder="Confirm Password" /> <br /></p>

        <p>Select your avatar: <input type="file" name="upload" /> <br /></p>

        <input type="submit" name="submit" value="Register"
            style="display: inline-block;border: 1px solid white; border-radius: 30px; background-color:blue; color: white; width: 200px;padding: 10px; " />

    </form>
</div>