<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

$error = '';
$result = '';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $select = $_POST['select'];
    $display_name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $accept = isset($_POST['accept']) ? $_POST['accept'] : '';

    if (empty($name))
        $error = "ten khong dc de trong";
    else if (empty($password)) {
        $error = "password ko dc de trong";
    } else if (empty($select)) {
        $error = "User type ko dc de trong";
    } else if (strlen($display_name) > 24) {
        $error = 'Display name khong duoc vuot qua ki tu';
    } else if (empty($address)) {
        $error = "Address ko dc de trong";
    } else if (empty($email)) {
        $error = "email ko dc de trong";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "truong email phai co dinh dang email";
    }

    if (empty($error)) {
        $result .= "Name: $name <br/>";
        $result .= "Passqword: $password <br/>";
        $result .= "User type: $select <br/>";
        $result .= "Display name: $display_name <br/>";
        $result .= "Address: $address <br/>";
        $result .= "Email: $email <br/>";
        $gender_text = '';
        $accept = '';
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

        if (!empty($gender_text)) {
            $result .= "Gender: $gender_text <br/>";
        }
        if (isset($_POST['accept'])) {
            if ($_POST['accept'] == 2) {
                $accept_text = 'accept';
            }
        }
        if (!empty($accept_text)) {
            $result .= " $accept_text <br/>";
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


<form action="" method="POST">
    <table border="1">
        <tr style="text-align: center">
            <td colspan="2">Registration Form</td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"
                    value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" />
            </td>
        </tr>
        <tr>
            <td>User Type</td>
            <td>
                <select name="select">
                    <option value="">--Select--</option>
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
            <td>Display name</td>
            <td><input type="text" name="diaplay_name" value="<?php echo ($_POST['name']) ?  $display_name : ''; ?>"
                    disabled /></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><textarea name="address"><?php echo isset($_POST['address']) ? $_POST['address'] : '' ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" />
            </td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                <?php
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
            <td></td>
            <td>
                <?php
                $choose_accept = '';
                if (isset($_POST['accept'])) {
                    if ($_POST['accept'] == 2) {
                        $choose_accept = 'checked';
                    }
                }
                ?>
                <input type="checkbox" name="accept" value="2" <?php echo $choose_accept; ?> /> I accept terms and
                Conditions
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <input type="submit" name="submit" value="Submit" />
                <input type="reset" name="reset" value="Reset" />
            </td>
        </tr>
    </table>

</form>