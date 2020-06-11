<?php

class sachs
{

    public $maSach;
    public $tenSach;
    public $soLuong;
    public $donGia;

    public $connection;

    const DB_HOST = "localhost";
    const USER_NAME = "root";
    const PASSWORD = "";
    const DB_NAME = "quanlysach";
    const DB_PORT = 3306;

    public function __construct()
    {
        //tu dong khoi tao bien ket nnoi
        $this->connection = $this->getConnection();
    }

    //ket noi csdl
    public function getConnection()
    {
        $connection = mysqli_connect(self::DB_HOST, self::USER_NAME, self::PASSWORD, self::DB_NAME, self::DB_PORT);
        if (!$connection) {
            die("loi ket noi: " . mysqli_connect_error());
        }
        return $connection;
    }
    public function create()
    {
        $sql_insert =
            "INSERT INTO sach(`maSach`, `tenSach`,`soLuong`,`donGia`)
        VALUES ('$this->maSach', '$this->tenSach','$this->soLuong','$this->donGia')";
        //thực thi truy vấn
        $is_insert =
            mysqli_query($this->connection, $sql_insert);
    }
    public function edit()
    {
        $sql_select_one = "select * from sach where `maSach`= $this->maSach";
        //thuc thi truy van
        $result_one = mysqli_query($this->connection, $sql_select_one);
        $sach = mysqli_fetch_assoc($result_one);
    }
    public function delete()
    {

        //tao truy van xoa
        $sql_delete = "delete from students where `maSach`=$this->maSach ";
        //thuc thi truy van
        $is_delete = mysqli_query($this->connection, $sql_delete);
    }
    public function index()
    {
        //tao cau truy van
        $sql_select = "select * from sach";
        //thuc thi truy van
        $result_all = mysqli_query($this->connection, $sql_select);
        $sachs = [];
        if (mysqli_num_rows($result_all)) {
            $sachs = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
        }

        // echo "<pre>";
        // print_r($students);
        // echo "</pre>";
    }
}
//khoi tao doi tuong tu class tren
$sach = new sachs();
$sach->index();
$sach->create();
$sach->delete();
$sach->edit();

?>
<table>
    <tr>
        <th>Ma sach</th>
        <th>Ten sach</th>
        <th>So luong</th>
        <th>Don gia</th>
        <th></th>
    </tr>
    <?php foreach ($sachs as $sach) : ?>
    <tr>
        <td><?php echo $sach['maSach']; ?></td>
        <td><?php echo $sach['tenSach']; ?></td>
        <td><?php echo $sach['soLuong']; ?></td>
        <td><?php echo $sach['donGia']; ?></td>
        <!-- <td>
            <?php
            //$link_update = 'update.php?id=' . $student['id'];
            // $link_delete = 'delete.php?id=' . $student['id'];
            ?>
            <a href="<?php echo $link_update ?>">Sửa</a>
            <a href="<?php echo $link_delete ?>" onclick="return confirm('Muốn xóa?')">
                Xóa
            </a>
        </td> -->
    </tr>
    <?php endforeach; ?>
</table>