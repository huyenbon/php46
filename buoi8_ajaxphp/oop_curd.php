<?php

//su dung OPP de viet chuong trinh quan ly sinh version_compare//phan tich class Student de xem doi tuong sinh vien co the co cac thuoc tinh va phuong tthuc gi

class Student
{
    public $id;
    public $name;
    public $age;
    public $created_at;

    //thuoc tinh them de luu bien ket noi csdl

    public $connection;

    const DB_HOST = "localhost";
    const USER_NAME = "root";
    const PASSWORD = "";
    const DB_NAME = "buoi7";
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
    }
    public function edit()
    {
    }
    public function delete()
    {
    }
    public function index()
    {
        //tao cau truy van
        $sql_select = "select * from students";
        //thuc thi truy van
        $result_all = mysqli_query($this->connection, $sql_select);
        $students = [];
        if (mysqli_num_rows($result_all)) {
            $students = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
        }

        // echo "<pre>";
        // print_r($students);
        // echo "</pre>";
    }
}
//khoi tao doi tuong tu class tren
$student = new Student();
$student->index();