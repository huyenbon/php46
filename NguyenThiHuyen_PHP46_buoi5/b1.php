<?php

$error = '';
$result = '';

echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "<pre>";
print_r($_FILES);
echo "</pre>";

if (isset($_POST['submit'])) {
    $file_arr = $_FILES['upload'];

    if ($file_arr['error'] == 0) {
        $extension = pathinfo($file_arr['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        $arr_extension = ['jpg', 'png', 'gif', 'jpeg'];
        if (!in_array($extension, $arr_extension)) {
            $error = 'phai upload file dang anh';
        }
        $size = $file_arr['size'];
        $size = $size / (1024 * 1024);
        $size = round($size, 2);
        if ($size > 1) {
            $error = 'file upload ko duoc lon hon 1MB';
        }

        if (empty($error)) {
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
                    $size = round($file_arr['size'] / 1024 / 1024, 2);
                    $result .= "<br/>";
                    $result .= "dung luong anh: $size Mb";
                    $result .= "<br/>";
                    $result .= "ten file anh: $filename ";
                }
            }
        }
    }
}
?>
<h3 style="color: red;">
    <?php echo $error; ?>
</h3>
<h3 style="color: pink;">
    <?php echo $result; ?>
</h3>
<p>Select a file upload</p>
<form method="POST" enctype="multipart/form-data" action="">
    Upload file<input type="file" name="upload" /> <br />
    <p style="color:silver">Only jpg, png, gif, file maximum size of 1 MB</p>

    <input type="submit" name="submit" value="Save"
        style="border: 1px solid white; border-radius: 30px; background-color:blue; color: white; width: 200px; " />

</form>