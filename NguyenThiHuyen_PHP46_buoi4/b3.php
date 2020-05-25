<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

$error = '';
$result = '';
$resultTB = '';
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = isset($_POST['select']) ? $_POST['select'] : '';
    $courses = isset($_POST['courses']) ? $_POST['courses'] : '';
    $text = $_POST['text'];

    if (empty($email))
        $error = "Email khong dc de trong";
    else if (empty($password)) {
        $error = "password ko dc de trong";
    } else if (strlen($password) < 8) {
        $error = 'password phai toi thieu 8 ki tu';
    }

    if (empty($error)) {
        $resultTB = "Dang ky thanh cong! <br/> Thoong tin cua ban la: <br/>";
        $result .= "Enter email address: $email <br/>";
        $result .= "Passqword: $password <br/>";
        $result .= "User type: $select <br/>";
        $courses_text = '';
        $choose_accept = '';
        if (isset($_POST['courses'])) {
            switch ($_POST['courses']) {
                case 0:
                    $courses_text = 'CSCI 1710';
                    break;
                case 1:
                    $courses_text = 'CSCI 1800';
                    break;
                case 2:
                    $courses_text = 'CSCI 2800';
                    break;
                case 3:
                    $courses_text = 'CSCI 2150';
                    break;
                case 4:
                    $courses_text = 'CSCI 2910';
                    break;
            }
        }

        if (!empty($courses_text)) {
            $result .= "Identify courses taken: $courses_text <br/>";
        }
        if (isset($_POST['concentration'])) {
            switch ($_POST['concentration']) {
                case 5:
                    $choose_accept = 'CS';
                    break;
                case 6:
                    $choose_accept = 'IS';
                    break;
                case 7:
                    $choose_accept = 'IT';
                    break;
            }
        }

        if (!empty($choose_accept)) {
            $result .= " Select concentration: $choose_accept <br/>";
        }
        $result .= "Message: $text <br/>";
    }
}
?>
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<h3 style="color: blue">

    <?php echo $resultTB; ?>
</h3>
<h3 style="color: green">

    <?php echo $result; ?>
</h3>


<form action="" method="POST">
    <table>
        <tr>
            <td>Enter email address</td>
            <td><input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" />
            </td>
        </tr>
        <tr>
            <td>Enter password</td>
            <td><input type="password" name="password"
                    value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" />
            </td>
        </tr>
        <tr>
            <td>Select academic level</td>
            <td>
                <select name="select">
                    <option value="">Freshman</option>
                    <option value="select1"
                        <?php if (isset($select) && $select == 'select1') echo "selected=\"selected\"";  ?>>Lua chon 1
                    </option>
                    <option value="select2"
                        <?php if (isset($select) && $select == 'select2') echo "selected=\"selected\"";  ?>>Lua chon 2
                    </option>

                </select>
            </td>
        </tr>
        <tr>
            <td>Identify courses taken</td>
            <td>
                <?php
                $courses17 = '';
                $courses18 = '';
                $courses28 = '';
                $courses21 = '';
                $courses29 = '';


                if (isset($_POST['courses'])) {
                    switch ($_POST['courses']) {
                        case 0:
                            $courses17 = 'checked';
                            break;
                        case 1:
                            $courses18 = 'checked';
                            break;
                        case 2:
                            $courses28 = 'checked';
                            break;
                        case 3:
                            $courses21 = 'checked';
                            break;
                        case 4:
                            $courses29 = 'checked';
                            break;
                    }
                }
                ?>
                <input type="checkbox" name="courses" value="0" <?php echo $courses17; ?> />CSCI 1710
                <br />
                <input type="checkbox" name="courses" value="1" <?php echo $courses18; ?> /> CSCI 1800
                <br />
                <input type="checkbox" name="courses" value="2" <?php echo $courses28; ?> /> CSCI 2800
                <br />
                <input type="checkbox" name="courses" value="3" <?php echo $courses21; ?> /> CSCI 2150
                <br />
                <input type="checkbox" name="courses" value="4" <?php echo $courses29; ?> /> CSCI 2910
                <br />
            </td>
        </tr>
        <tr>
            <td>Select concentration</td>
            <td>
                <?php
                $choose_accept5 = '';
                $choose_accept6 = '';
                $choose_accept7 = '';
                if (isset($_POST['concentration'])) {
                    switch ($_POST['concentration']) {
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
                <input type="radio" name="concentration" value="5" <?php echo $choose_accept5; ?> /> Computer science
                (CS)
                <br />
                <input type="radio" name="concentration" value="6" <?php echo $choose_accept6; ?> /> Information science
                (IS)
                <br />
                <input type="radio" name="concentration" value="7" <?php echo $choose_accept7; ?> /> Information
                technology (IT)
                <br />

            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="text" name="text" style="display:inline-block; width: 100%; padding:40px;"
                    value="<?php echo isset($_POST['text']) ? $_POST['text'] : '' ?>" /></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Submit" />
            </td>
        </tr>
    </table>

</form>