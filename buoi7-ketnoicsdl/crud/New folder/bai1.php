<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";

$error = '';
$result = '';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $birthday = $_POST['birthday'];
    $description = $_POST['description'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    if (empty($name))
        $error = "ten khong dc de trong";
    else if (empty($salary)) {
        $error = "salary ko dc de trong";
    } else if (empty($birthday) || empty($description)) {
        $error = "truong  birthday hoac class details ko duoc de trong";
    }
    $gender_text = '';
    if (isset($_POST['gender'])) {
        switch ($_POST['gender']) {
            case 0:
                $gender_text = 'Female';
                break;
            case 1:
                $gender_text = 'Male';
                break;
        }
    }
    // if (empty($error)) {
    //     $result .= "name: $name <br/>";
    //     $result .= "class details: $description <br/>";
    //     $result .= "salary: $salary <br/>";

    //     $gender_text = '';
    //     if (isset($_POST['gender'])) {
    //         switch ($_POST['gender']) {
    //             case 0:
    //                 $gender_text = 'Female';
    //                 break;
    //             case 1:
    //                 $gender_text = 'Male';
    //                 break;
    //         }
    //     }
    //     if (!empty($gender_text)) {
    //         $result .= "Gender: $gender_text <br/>";
    //     }
    //     $result .= "birthday: $birthday <br/>";
    // }
    if (empty($error)) {
        //tạo câu truy vấn insert
        $sql_insert =
            "INSERT INTO employees(`name`, `description`,`gender`,`salary`,`birthday`,`created_at`)
            VALUES ('$name', '$description', '$gender',$salary,'$birthday','')";
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
<h3 style="color: blue">
    <?php echo $result; ?>
</h3>



<form action="" method="post">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" /></td>
        </tr>


        <tr>
            <td>Description</td>
            <td><textarea
                    name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Salary</td>
            <td><input type="text" name="salary"
                    value="<?php echo isset($_POST['salary']) ? $_POST['salary'] : '' ?>" />
            </td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                <!-- xu ly checked cho input radio -->
                <?php
                //co bao nhieu radio thi se tao bay nhieu bien dang checked
                $gender_female = '';
                $gender_male = '';
                if (isset($_POST['gender'])) {
                    switch ($_POST['gender']) {
                        case 0:
                            $gender_female = 'checked';
                            break;
                        case 1:
                            $gender_male = 'checked';
                            break;
                    }
                }
                ?>
                <input type="radio" name="gender" value="0" <?php echo $gender_female; ?> />Female
                <input type="radio" name="gender" value="1" <?php echo $gender_male; ?> /> Male
            </td>
        </tr>
        <tr>
            <td>birthday</td>
            <td><input type="date" name="birthday"
                    value="<?php echo isset($_POST['birthday']) ? $_POST['birthday'] : '' ?>" /></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Save" />
                <input type="reset" name="reset" value="Cancel" />
            </td>
        </tr>
    </table>

</form>