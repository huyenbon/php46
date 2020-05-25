<?php
$arr = [1, 60, 5, 8, 66, 22, 2];
//tinh tong va tich cua cac phan tu cua mang
//dung foreach

$sum = 0;
$mul = 1;
foreach ($arr as $i => $value) {
    $sum += $value;
    $mul *= $value;
}
echo "tong: $sum , tich: $mul";

/*
    CU PHAP VIET TA IF ELSEIF ELSE CUA PHP KHI VIET LONG VOI html

    <?php
        $number = 5;
    ?>

<?php if($number >0): ?>

<table>
    <tr>
        <td>cot a</td>
        <td>gia tri</td>
    </tr>
</table>

<?php else: ?>
<table>
    <tr>
        <td>cot b</td>
        <td>gia tri</td>
    </tr>
</table>
<?php endif; ?>

*/


//vd3
//thi can dung cu phap viet tat....
$arr2 = ['PHP', 'HTML', 'CSS', 'JS']

?>
<table border="1">
    <tr>
        <th>Ten khoa hoc</th>
    </tr>
    <?php foreach ($arr2 as $value) : ?>
    <tr>
        <td><?php echo "$value"; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php

//THUC HANH 1 SO HAM CO SAN THONG DUNG CUA PHP VE XU LY MANG

$arr3 = [1, 5, 7];
//tinh tong
$sum = array_sum($arr3);
echo $sum;
//kiem tra xem key co ton tai trong mang hay k?
$arr4 = [
    'name' => 'Bon',
    'age' => 21

];

$is_exists = array_key_exists('123', $arr4);
var_dump($is_exists); //false;

//tim kiem vi tri xuat hien cua 1 phan tu trong mabg,
//tra ve key cua phan tu tim thay neu co, nguocc lai ko co => tra ve false

$arr = ['a', 'b'];
$position = array_search('cde', $arr);
echo $position; //false

//loai bo gia tri trung lap trong mang

$arr = [1, 2, 2, 4];
$arr = array_unique($arr);
print_r($arr);

//them phan tu vao cuoi mang

$arr = [1, 2];
//them phan tu co gia tri = 222 vao cuoi mang
$arr[] = 222;
print_r($arr); //[1,2,222]

//cach 2: chen vao cuoi mang
array_push($arr, 222);
print_r($arr);

//Lay tong so phan tu dang co cua mang
$count = count($arr); //3
//kiem tra cos phai la mang hay ko
$is_arr = is_array($arr);

//xoa phan tu cua mang
$arr = [
    'name' => 'Bon',
    'age' => 21
];

unset($arr['name']);
print_r($arr); //['age' =>21];

//demo 1 so ham thao tac voi string
//lay do dai chuoi strlen

$string = 'abc';
echo strlen($string); //3

//chuyen chuoi ve chu thuong strtolower
$string = "Nguyen Thi Huyen";
echo strtolower($string);
//chuyen sang chu hoa: strtoupper
$string = "Nguyen Thi Huyen";
echo strtoupper($string);

//chuyen ky tu dau tien cua chuoi thanh chu hoa: ucfirst()
$string = "Nguyen Thi Huyen";
echo ucfirst($string); //Abc
//cat khoang trang dau va cuoi chuoi : trim
$string = "           Nguyen         ";
echo trim($string); //Nguyen
//ham lay chuoi con tu chuoi ban dau: substr
$string = "Nguyen Thi Huyennnn";
echo substr($string, 1); //guyen Thi Huyennn
echo substr($string, 1, 4); //guyen
echo substr($string, 1, -5); //u (lay tu cuoi (-5))


//THAO TAC VOI NUMBER
$n = 5;
is_int(5); //true
is_float(5); //false
//lam tron so
$n = 1.37;
echo ceil($n); //2 -lam tron len so nguyen gan nhat
echo floor($n); //1 -lam tron xuong

//format dinh dang tien

$sprice = 136633200222;
echo number_format($sprice); //136.633.200.222

//THAO TAC VOI TIME

echo time();
//tra ve so giay (unix timestamp) tu thoi diem hien tai so voi thoi diem 1-1-19704
//14/05/2020 21:09:20
//chua set timezone

//date_defaut_timezone_set('Asia/HO_CHI_MInh').......