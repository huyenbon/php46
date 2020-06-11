<?php
session_start();
if (isset($_SESSION['success'])) {
    echo "<h3 style='color:green'>";
    echo $_SESSION['success'];
    echo "</h3>";
}
unset($_SESSION['success']);
require_once 'database1.php';
$querySelect = "select * from employees";
$isSelect = mysqli_query($connection, $querySelect);
if (mysqli_num_rows($isSelect) > 0) {
    $categories = mysqli_fetch_all($isSelect, MYSQLI_ASSOC);
}
mysqli_close($connection);
?>

<body>
    <div class="container">
        <a href="Insert_nhanvien.php" class="add-new-employees">+Add New Employees</a>
        <table border="1" cellspacing="0" cellpadding="8">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Salary</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Created_at</th>
                <th>Action</th>
            </tr>
            <?php if (empty($categories)) : ?>
            <tr>
                <td colspan="7">
                    Khong co ban ghi nao
                </td>
            </tr>
            <?php else : ?>
            <?php foreach ($categories as $key => $category) : ?>
            <tr>
                <td>
                    <?php
                            echo $category['id'];
                            ?>
                </td>
                <td>
                    <?php
                            echo $category['name'];
                            ?>
                </td>
                <td>
                    <?php
                            echo $category['description'];
                            ?>
                </td>
                <td>
                    <?php
                            echo $category['salary'];
                            ?>
                </td>
                <td>
                    <?php
                            $_SESSION['genderText'] = '';
                            $gender = $category['gender'];
                            if ($gender == 1) {
                                $_SESSION['genderText'] = 'Male';
                            } else {
                                $_SESSION['genderText'] = 'Female';
                            }
                            echo $_SESSION['genderText'];
                            ?>
                </td>
                <td>
                    <?php
                            echo $category['birthday'];
                            ?>
                </td>
                <td>
                    <?php
                            echo $category['created_at'];
                            ?>
                </td>
                <td>
                    <a href="information_employees.php?id=<?php echo $category['id'] ?>">Hien Thi</a> /
                    <a href="update_employees.php?id=<?php echo $category['id'] ?>">sửa</a> /
                    <a onclick="return confirm('Bạn có muốn xóa không?');" id="muc_<?php echo $category['id'] ?>"
                        href="">xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</body>

</html>