<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

$error = '';
$result = '';
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

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
        <tr>
            <td colspan="2">Register</td>
        </tr>
        <tr>
            <td>First name</td>
            <td><input type="text" name="first_name"
                    value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>" /></td>
        </tr>
        <tr>
            <td>Last name</td>
            <td><input type="text" name="last_name"
                    value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>" />
            </td>
        </tr>
        <tr>
            <td>User name</td>
            <td><input type="text" name="user_name"
                    value="<?php echo isset($_POST['user_name']) ? $_POST['user_name'] : '' ?>" />
            </td>
        </tr>

        <tr>
            <td>Email address</td>
            <td><input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" />
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"
                    value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" />
            </td>
        </tr>
        <tr>
            <td>Confirm password</td>
            <td>
                <input type="password" name="confirm_password"
                    value="<?php echo isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '' ?>" />
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <input type="submit" name="submit" value="Save" />
            </td>
        </tr>
    </table>

</form>