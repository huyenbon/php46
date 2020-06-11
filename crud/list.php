<?php
session_start();
//File list.php: liệt kê students
require_once 'database.php';

//hiển thị các thông báo thành công hoặc lỗi
//  liên quan đến thêm mới,
//cập nhật hoặc xóa
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}

//thực hiện truy vấn để lấy ra tất cả các students
//viết câu truy vấn
$sql_select_all = "SELECT * FROM students";
//thực thi truy vấn, nhớ là kết quả trả về đang ở
//dạng 1 object trung gian
$result_all =
    mysqli_query($connection, $sql_select_all);
//khởi tạo 1 mảng students với giá trị rỗng
$students = [];
//nếu như có bản ghi trả về, thì sẽ chuyển đổi về
//mảng kết hợp các sinh viên để hiển thị ra
if (mysqli_num_rows($result_all) > 0) {
    $students =
    mysqli_fetch_all($result_all,
        MYSQLI_ASSOC);
}
//hiển thị biến này ra màn hình dưới dạng bảng
echo "<pre>";
print_r($students);
echo "</pre>";
?>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php foreach($students AS $student): ?>
        <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['age']; ?></td>
            <td>
                <?php
                //với trường ngày tạo, mặc định trong
                //bảng đang có format là yyyy-mm-dd H:i:s
                //chuyển đổi lại format
                $created_at =
                    date('d-m-Y H:i:s',
                        strtotime($student['created_at']));
                echo $created_at;
                ?>
            </td>
            <td>
                <?php
                //là cột chứa các chức năng như Xem chi tiêt,
//                Sửa, Xóa bản ghi tương ứng
                //luôn phải truyền tham số id, để biết
//                là đang thao tác với bản ghi nào
                $link_update = 'update.php?id=' . $student['id'];
                $link_delete = 'delete.php?id=' . $student['id'];
                ?>
                <a href="<?php echo $link_update?>">Sửa</a>
                <a href="<?php echo $link_delete?>"
                   onclick="return confirm('Muốn xóa?')">
                    Xóa
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
