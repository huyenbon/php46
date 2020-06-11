    <?php

    //B1 khoi tao ket noi
    //cac thong so nay do XAMPP da tu dong tao ra cho ban
    const DB_HOST = 'localhost';//ten server dang chua mysql
    const DB_USERNAME = 'root';//username dang nhap vao my sql
    const DB_PASSWORD = ''; //password dang nhap vao mysql
    const DB_NAME = 'buoi7'; //ten csdl muon ket noi
    const DB_PORT = 3306; // cong ket noi vao mysql


    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

    if (!$connection) {
        die("ket noi csdl that bai. Loi: " . mysqli_connect_error());
    }
    echo "<h2>Ket nooi csdl thanh cong</h2>";

    // echo "<pre>";
    // print_r($connection);
    // echo "</pre>";

    // Thuc thi cac truy van sau khi ket noi csdl
    // + INSERT vao bang students, dang co ca truong la id, name, age , crate_at

    $sql_insert = "INSERT INTO students(`name`,`age`) VALUES('Bon', 18),('Bi', 14) ";

    // thuc thi truy van insert
    //voi cac truy van insert, update, delete thi ham  mysqli_query se tra ve kieu du lieu boolean

    $is_insert = mysqli_query($connection, $sql_insert);
    if ($is_insert) {
        echo "thanh cong";
    } else
        echo "loi";

    // truy van UPDATE
    //luon luu y khi update va delete phai kem theo dieu kien where de biet dc dang thao tac voi ban ghi nao
    //voi cac truy van insert, update, delete thi ham  mysqli_query se tra ve kieu du lieu boolean
    echo "<br/>";
    $sql_update = "UPDATE students SET `name` = 'Boo' where id= 6";
    $is_update = mysqli_query($connection, $sql_update);
    if ($is_update) {
        echo "update thanh cong";
    } else
        echo "update that bai";
    echo "<br/>";

    //thuc thi truy van voi insert, update, delete luong tra ve kieu boolean
    $sql_delete = "DELETE from students where id >= 7";
    $is_delete = mysqli_query($connection, $sql_delete);
    if ($is_delete) {
        echo "delete thanh cong";
    } else
        echo "delete that bai";
    echo "<br/>";

    //truy van SELECT
    //lay ra tat ca ban ghi dang co trong students
    //tao truy van select
    $sql_select_all = "select * from students";
    //thuc thi truy van, voi truy van select, se khong tra ve kieu du lieu true/false nhu insert, updtae, delete ma se tra ve 1 bien trung gian
    $result_all = mysqli_query($connection, $sql_select_all);

    // echo "<pre>";
    // print_r($result_all);
    // echo "</pre>";

    //do ket qua tra ve coi truy van select dang la 1 object chua ro rang, nen can 1 so buoc sau de chuyen doi ve kieu du lieu mang

    $students = [];
    //tra ve so ban ghi dang co tu cau truy van, dua vao //key = num_rows cua bien result_all
    $count_rows = mysqli_num_rows($result_all); //6
    //kiem tra neu co ban ghi thi moi xu ly

    if ($count_rows > 0) {
        //lay tat ca ban ghi chuyen doi tu bien result_all thanh kieu du lieu mang ket hop dua vao hang so MYSQLI_ASSOC (nó hiển thị ra cái tên trường, nếu không có nó hiên thị ra key như bình thường [0] => .... )
        //mysqli_fetch_all: chuyeen doi kieu du lieu thanh dang mang
        $students = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
    }
    echo "<pre>";
    print_r($students);
    echo "</pre>";

    // truy van select lay 1 ban ghi duy nhat

    $sql_select_one = "select * from students where id= 1";
    //thuc thi truy van, tra ve obj trung gian do la truy van select

    $result_one = mysqli_query($connection, $sql_select_one);
    //khi ma chac chan cau truy van chi tra ve 1 ban duy nhat, thi se dung ham mysqli_fetch_assoc de tra ve du lieu luon
    $student = mysqli_fetch_assoc($result_one);
    echo " thong tin voi ban ghi id = 1";
    echo "<pre>";
    print_r($student);
    echo "</pre>";
    //tinh tong so ban ghi tra ve su dung ham COUNT
    $sql_select_count = "SELECT COUNT(id) as count_id from students";
    $result_count = mysqli_query($connection, $sql_select_count);
    $arr_count = mysqli_fetch_assoc($result_count);
    echo "<pre>";
    print_r($arr_count);
    echo "</pre>";
    // echo "tong so ban ghi dang co trong bang students = $count";