<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";

$error = '';
$result = '';
$resultTB = '';
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $select = isset($_POST['select']) ? $_POST['select'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    if (empty($first_name))
        $error = "first name khong dc de trong";
    else if (empty($last_name)) {
        $error = "last name ko dc de trong";
    }
    if (empty($error)) {
        $resultTB = "Dang ky thanh cong! <br/> Thoong tin cua ban la: <br/>";
        $result .= "Firstname: $first_name <br/>";
        $result .= "Lastname: $last_name <br/>";

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

        if (!empty($gender_text)) {
            $result .= "Gender: $gender_text <br/>";
        }
        $result .= "State: $select <br/>";
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label>First name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Enter first name"
                                value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label>Last name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="last name"
                                value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>">
                        </div>
                        <div class="form-check">
                            <span style="padding-right: 10px;">Gender</span>
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
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="select">
                                <option value="Johor"
                                    <?php if (isset($select) && $select == 'Johor') echo "selected=\"selected\"";  ?>>
                                    Johor</option>
                                <option value="2"
                                    <?php if (isset($select) && $select == '2') echo "selected=\"selected\"";  ?>>
                                    2</option>
                                <option value="3"
                                    <?php if (isset($select) && $select == '3') echo "selected=\"selected\"";  ?>>
                                    3</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                        <button type="reset" class="btn btn-light" name="reset" value="Reset">Reset</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Login</div>
                <div class="panel-body" style="margin-top: 20px;">
                    <form class="form-group" method="POST">
                        <p><button type="submit" class="btn btn-primary" style="width:100%;">abc</button> </p>
                        <p><button type="submit" class="btn btn-primary" style="width:100%;">abcaaa</button> </p>
                        <p><button type="submit" class="btn btn-primary" style="width:100%;">abcaa</button></p>
                        <p><button type="submit" class="btn btn-primary" style="width:100%;">abcaaaaa</button></p>
                        <p><button type="submit" class="btn btn-primary" style="width:100%;">abcaaaaaa</button></p>
                        <p><button type="submit" class="btn btn-primary" style="width:100%;">abcaa</button> </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>