<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "<pre>";
print_r($_FILES);
echo "</pre>";
$result = '';
$error = '';

if (isset($_POST['submit'])) {
    $text = $_POST['text'];
    $textarea = $_POST['textarea'];
    $select = $_POST['select'];

    $file_arr = $_FILES['upload'];

    $radio_button = isset($_GET['radio_button']) ? $_GET['radio_button'] : '';


    if (empty($text)) {
        $error = 'text khong duoc de trong';
    } else if (empty($textarea)) {
        $error = 'textarea khong duoc de trong';
    } else if ($file_arr['error'] == 0) {
        $extension = pathinfo($file_arr['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        $arr_extension = ['jpg', 'png', 'gif', 'jpeg'];
        if (!in_array($extension, $arr_extension)) {
            $error = 'phai upload file dang anh';
        }
    }

    if (empty($error)) {
        //text
        $result .= "text: $text <br/>";
        //textarea
        $result .= "textarea: $textarea <br/>";
        //radio button
        $radio_button_text = '';
        if (isset($_GET['radio_button'])) {
            switch ($_GET['radio_button']) {
                case 0:
                    $radio_button_text = 'yep';
                    break;
                case 1:
                    $radio_button_text = 'nope';
                    break;
                case 2:
                    $radio_button_text = 'none';
                    break;
            }
        }

        if (!empty($radio_button_text)) {
            $result .= "radio_button: $radio_button_text <br/>";
        }
        //upload file
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

    //checkbox
    if (isset($_POST['checks'])) {
        $checks = $_POST['checks'];
        foreach ($checks as $check) {
            if ($check == 5) {
                $result .= "checkbox 1 <br/>";
            }
            if ($check == 6) {
                $result .= "checkbox 2 <br/>";
            }
            if ($check == 7) {
                $result .= "checkbox 3 <br/>";
            }
        }
    }
    //select
    switch ($select) {
        case 0:
            $result .= "option 1 <br/>";
            break;
        case 1:
            $result .= "option 2 <br/>";
            break;
    }
}

?>
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<h3 style="color: blue">
    <?php echo $result; ?>
</h3>


<form action="" method="POST">
    <p>Text</p>
    <p><input type="text" name="text" placeholder="Placeholder"
            value="<?php echo isset($_POST['text']) ? $_POST['text'] : '' ?>" />
    </p>
    <p>Check box</p>
    <p>
        <?php
        $checked_5 = '';
        $checked_6 = '';
        $checked_7 = '';
        if (isset($_POST['checks'])) {
            $jobs = $_POST['checks'];
            foreach ($checks as $check) {
                if ($check == 5) {
                    $checked_5 = 'checked';
                }
                if ($check == 6) {
                    $checked_6 = 'checked';
                }
                if ($check == 7) {
                    $checked_7 = 'checked';
                }
            }
        }
        ?>
        <input type="checkbox" name="checks[]" value="5" <?php echo $checked_5; ?> /> Check box 1 <br />
        <input type="checkbox" name="checks[]" value="6" <?php echo $checked_6; ?> /> Check box 2 <br />
        <input type="checkbox" name="checks[]" value="7" <?php echo $checked_7; ?> /> Check box 3 <br />

    </p>

    <p>Textarea</p>
    <p><textarea name="textarea"><?php echo isset($_GET['textarea']) ? $_GET['textarea'] : '' ?></textarea>
    </p>
    <p>Radio button</p>
    <p>
        <?php
        $choose_accept5 = '';
        $choose_accept6 = '';
        $choose_accept7 = '';
        if (isset($_POST['radio_button'])) {
            switch ($_POST['radio_button']) {
                case 5:
                    $choose_accept5 = 'checked';
                    break;
                case 6:
                    $choose_accept6 = 'checked';
                    break;
                case 7:
                    $choose_accept7 = 'checked';
                    break;
            }
        }
        ?>
        <input type="radio" name="radio_button" value="5" <?php echo $choose_accept5; ?> /> yep
        <input type="radio" name="radio_button" value="6" <?php echo $choose_accept6; ?> /> nope
        <input type="radio" name="radio_button" value="7" <?php echo $choose_accept7; ?> /> none

    </p>
    <p>Select</p>
    <p>
        <?php
        if (isset($_POST['select'])) {
            $select = $_POST['select'];
            $selected_0 = '';
            $selected_1 = '';
            switch ($select) {
                case 0:
                    $selected_0 = 'selected';
                    break;
                case 1:
                    $selected_1 = 'selected';
                    break;
            }
        }
        ?>
        <select name="select">

            <option value="0" <?php echo $selected_0;  ?>>
                option1
            </option>
            <option value="1" <?php echo $selected_1; ?>>
                option2
            </option>

        </select>
    </p>
    <p>Upload file</p>
    <p><input type="file" name="upload" /> <br /></p>
    <p>
        <input type="submit" name="submit" value="Submit" />
    </p>

</form>