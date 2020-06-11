<?php
//File database.php: chứa các thông tin
//liên quan đến kết nối CSDL, file này
//được sử dụng để nhúng vào các file create,
//update, delete
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'day16';
const DB_PORT = 3306;
//khởi tạo kết nối cho biến $connection
$connection =
    mysqli_connect(DB_HOST,
        DB_USERNAME, DB_PASSWORD,
        DB_NAME, DB_PORT);
if (!$connection) {
    die('Kết nối thất bại. Lỗi: '
        . mysqli_connect_error());
}
echo "<h2>Kết nối thành công</h2>";