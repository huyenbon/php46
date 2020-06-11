<?php
session_start();
require_once "config.php";
$id=$_GET['id'];
$querySelect="select * from employees where id =$id";
$isSelect=mysqli_query($connection,$querySelect);
if(mysqli_num_rows($isSelect)>0){
    $categories=mysqli_fetch_all($isSelect,MYSQLI_ASSOC);
    $category=$categories[0];
}
mysqli_close($connection);
?>
<form action="" method="post">
    <div class="container">
        <h1>View Record</h1>
        <span>ID</span> <br/>
        <input type="text" name="id" disabled value="<?php echo isset($category['id'])?$category['id']:null ?>"/>
        <br/>
        <br/>
        <span>Name</span> <br/>
        <input type="text" name="name" disabled value="<?php echo isset($category['name'])?$category['name']:null ?>"/>
        <br/>
        <br/>
        <span>Description</span><br/>
        <textarea name="description" disabled><?php echo isset($category['description'])?$category['description']:null ?></textarea>
        <br/>
        <br/>
        <span>Salary</span><br/>
        <input type="text" name="salary" disabled value="<?php echo isset($category['salary'])?$category['salary']:null ?>"/>
        <br/>
        <br/>
        <span>Gender</span><br/>
        <input type="text" name="gender" disabled value="<?php
        $_SESSION['genderText']='';
        $gender=$category['gender'];
        if($gender==1){
            $_SESSION['genderText']='Male';
        }
        else{
            $_SESSION['genderText']='Female';
        }
        echo $_SESSION['genderText'];
        ?>"/>
        <br/>
        <br/>
        <span>Birthday</span><br/>
        <input type="text" name="birthday" disabled value="<?php echo isset($category['birthday'])?$category['birthday']:null ?>"/>
        <br/>
        <br/>
        <a href="employees_list.php" class="back">Back</a>
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
        background: blue;
        text-decoration: none;
        border-radius: 4px;
    }
</style>