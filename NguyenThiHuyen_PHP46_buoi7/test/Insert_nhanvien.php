<?php
session_start();
require_once 'config.php';
$error='';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $decription=$_POST['description'];
    $salary=$_POST['salary'];
    $gender=$_POST['gender'];
    $birthday=$_POST['birthday'];
    if(empty($_POST['name'])){
        $error='Name khong duoc de trong';
    }
    else{
        $queryInsert="insert into employees(`name`,`description`,`gender`,`salary`,`birthday`)
 values('$name','$decription','$gender','$salary','$birthday')";
        $isInsert=mysqli_query($connection,$queryInsert);
        if($isInsert){
            $error='';
            $_SESSION['success']="Insert thanh cong nhan vien $name";
            header("Location:employees_list.php");
            exit();
        }
        else{
            $error="Insert nhan vien that bai";
        }
    }
}
mysqli_close($connection);
?>
<h3 style="color:red">
    <?php
    echo $error;
    ?>
</h3>
<form action="" method="post">
   <div class="container">
       <h1>Create Records</h1>
      <span>Name*</span> <br/>
       <input type="text" name="name" value=""/>
       <br/>
       <br/>
       <span>Description</span><br/>
       <textarea name="description"></textarea>
       <br/>
       <br/>
       <span>Salary</span><br/>
       <input type="number" name="salary" value=""/>
       <br/>
       <br/>
       <span>Gender</span><br/>
       <input type="radio" name="gender" value="1" checked=""/> Male
       <input type="radio" name="gender" value="0"/>Female
       <br/>
       <br/>
       <span>Birthday</span><br/>
       <input type="date" name="birthday" placeholder="mm/dd/yyyy"/>
       <br/>
       <br/>
       <input type="submit" name="submit" value="Save"/>
       <a href="employees_list.php" class="reset" name="reset">Cancer</a>
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
    .reset{
        text-decoration: none;
        color:#fff;
       padding: 6px;
        border-radius: 4px;
        background: grey;
    }
    input[type=submit]{
        text-decoration: none;
        color:#fff;
        height: 30px;
        border-radius: 4px;
        border:none;
        background: blue;
    }
</style>