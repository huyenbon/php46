<!-- thuc hanh php -->
<!-- dung form html -->
<?php

//xu ly submit form
//debug mang $_GET
echo "<pre>";
print_r($_GET);
echo "</pre>";

//khai bao cac bien loi va thanh cong
$error = '';
$result = '';
//kiem tra xem bien da ton tai hay chua
if (isset($_GET['submit'])) {
    //gan du lieu tu mang $_GET cho cac bien
    //dat ten bien trung voi ten key cua mang
    $name = $_GET['name'];
    $email = $_GET['email'];
    $time = $_GET['time'];
    $class_details = $_GET['class_details'];
    //chu y: khi xu ly voi radio va checkbox, thi se co truong hop khong tich chon radio nao hoac khong tich chon checkbox nao thi mang $_GET hoac $_POST se khong bat dc name cua input tuong ung
    $gender = isset($_GET['gender']) ? $_GET['gender'] : '';
    //validate du lieu
    if (empty($name))
        $error = "ten khong dc de trong";
    else if (empty($email)) {
        $error = "email ko dc de trong";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "truong email phai co dinh dang email";
    } else if (empty($time) || empty($class_details)) {
        $error = "truong specific time hoac class details ko duoc de trong";
    }
    //xu ly khi validate thanh cong
    if (empty($error)) {
        $result .= "your given details are as: <br/>";
        $result .= "name: $name <br/>";
        $result .= "email: $email <br/>";
        $result .= "specific time: $time <br/>";
        $result .= "class details: $class_details <br/>";
        //doi voi cac input nhu radio, checkbox, select 
        //khi ma value dang o dang so thi truoc khi hien thi ra man hinh cho user can cos buoc chuyen doi du lieu ve dinh dang de hieu
        $gender_text = '';
        if (isset($_GET['gender'])) {
            switch ($_GET['gender']) {
                case 0:
                    $gender_text = 'Female';
                    break;
                case 1:
                    $gender_text = 'Male';
                    break;
            }
        }
        //chi hien thi ra gender khi gender_text co gia tri
        if (!empty($gender_text)) {
            $result .= "Gender: $gender_text <br/>";
        }
    }
}


?>
<!-- hien thi thong bao loi va thong bao thanh cong neu co -->
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<h3 style="color: blue">
    <?php echo $result; ?>
</h3>



<form action="" method="get">
    <table>
        <tr>
            <td>Name</td>
            <!-- do lai du lieu cho truong name dua vao trang thai submit form -->
            <td><input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>" /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : '' ?>" />
            </td>
        </tr>
        <tr>
            <td>Specific Time</td>
            <td><input type="date" name="time" value="<?php echo isset($_GET['time']) ? $_GET['time'] : '' ?>" /></td>
        </tr>
        <tr>
            <td>Class details</td>
            <td><textarea
                    name="class_details"><?php echo isset($_GET['class_details']) ? $_GET['class_details'] : '' ?></textarea>
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
                if (isset($_GET['gender'])) {
                    switch ($_GET['gender']) {
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
            <td colspan="2">
                <input type="submit" name="submit" value="Show info" />
                <input type="reset" name="reset" value="Reset" />
            </td>
        </tr>
    </table>

</form>