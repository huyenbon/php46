<?php
const DB_HOST='localhost';
const DB_USERNAME='root';
const DB_PASSWORD='';
const DB_NAME='phpbtvn';
const DB_PORT=3306;
$connection=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME,DB_PORT);
if($connection==false){
    die('ket noi that bai, '.mysqli_connect_error());
}
//echo"ket noi thanh cong toi ".DB_NAME;
mysqli_set_charset($connection,'utf8');