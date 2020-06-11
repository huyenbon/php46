<?php
session_start();
require_once 'config.php';
$id=$_GET['id'];
$querySelect="select * from employees where id =$id";
$isSelect=mysqli_query($connection,$querySelect);
if(mysqli_num_rows($isSelect)>0){
    $categories=mysqli_fetch_all($isSelect,MYSQLI_ASSOC);
    $category=$categories[0];
}
$checkedMale='';
$checkedFemale='';
if(isset($category['gender'])){
    switch($category['gender']){
        case 0:$checkedFemale='checked';break;
        case 1:$checkedMale='checked';break;
    }
}
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $decription=$_POST['description'];
    $salary=$_POST['salary'];
    $gender=$_POST['gender'];
    $birthday=$_POST['birthday'];
    $queryUpdate="update employees set `name`='$name',`description`='$decription',`salary`='$salary',`gender`='$gender',`birthday`='$birthday'
where id=$id";
    $isUpdate=mysqli_query($connection,$queryUpdate);
    if($isUpdate){
        $_SESSION['success']="Update thanh cong nhan vien voi id = $id";
        header("Location:employees_list.php");
        exit();
    }
}
mysqli_close($connection);
?>
<form action="" method="post">
    <div class="container">
        <h1>Update Records</h1>
        <span>Name*</span> <br/>
        <input type="text" name="name" value="<?php echo $category['name']?>"/>
        <br/>
        <br/>
        <span>Description</span><br/>
        <textarea name="description"><?php echo $category['description']?></textarea>
        <br/>
        <br/>
        <span>Salary</span><br/>
        <input type="number" name="salary" value="<?php echo $category['salary']?>"/>
        <br/>
        <br/>
        <span>Gender</span><br/>
       <?php
       $checkedMale='';
       $checkedFemale='';
       if(isset($category['gender'])){
           switch($category['gender']){
               case 0:$checkedFemale="checked";break;
               case 1:$checkedMale="checked";break;
           }
       }
       ?>
        <input type="radio" name="gender" value="1" <?php echo $checkedMale?>/> Male
        <input type="radio" name="gender" value="0" <?php echo $checkedFemale?>/>Female
        <br/>
        <br/>
        <span>Birthday</span><br/>
        <input type="date" name="birthday" value="<?php echo $category['birthday']?>"/>
        <br/>
        <br/>
        <input type="submit" name="submit" value="Save"/>
        <a href="employees_list.php" class="back">Cancer</a>
    </div>
</form>
<style>
    .container{
        width:40%;
        margin:40px auto;
    }
    input[type=text]{
        width:80%;
        margin:10px 0;
        height:20px;
    }
    textarea{
        width:80%;
        margin:10px 0;
        height:50px;
    }
    span{
        font-weight: bold;
    }
    .back{
        color:#fff;
        padding: 6px;
        background: darkgrey;
        text-decoration: none;
        border-radius: 4px;
    }
    input[type=submit]{
        color:#fff;
        padding: 6px;
        background: blue;
        text-decoration: none;
        border-radius: 4px;
        border:none;
        height: 30px;
    }
</style>