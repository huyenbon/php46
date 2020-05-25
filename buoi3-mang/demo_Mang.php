<?php
//khai bao 10 nhan vien

$arr = ['nv1', 'nv2', 'nv3'];
$arr2 = ['nv1', 'nv2', true, false, []];
//var_dump($arr2);

echo "<pre>";
print_r($arr2);
"</pre>";

//laays gia tri cua mang => dua vao key

echo $arr2[2];

//dung vong lap for de hien thi mang

//ham count($arr): dem phan tu cua mang
echo "\n";
$n = count($arr2);
for ($i = 0; $i < $n; $i++) {
    echo "\n";
    var_dump($arr2[$i]);
}

//vong lap foreach
//chi dung de lap mang, van co the su dung break, continue;
//de can thiep vong lap foreach

//NOTE: khi thao tac voi mang luon dung vong lap foreach

$arr3 = ['string', 123, 'aaa'];
foreach ($arr3 as $key => $value) {
    echo "key: $key value: $value";
    echo "<br />";
}


$arr4 = [true, null];
foreach ($arr4 as $i => $value) {
    echo "key: $i value: $value";
    echo "\n";
}
//cu phap khuyet key
foreach ($arr as $value) {
    echo "value: $value";
    echo "\n";
}
//co 2 cach lay gia tri cua mang
//lay gia tri theo key
echo $arr[0];
echo $arr[1];
echo $arr[2];

//PHAN LOAI MANG TRONG PHP
//co 3 loai
//1- Mang tuần tự, mảng có key là số nguyên
//với mảng tuần tự mà ko khai báo tường minh key,
//thi key của phần tử đầu tiên sẽ nhận giá trị = 0;

$arr3 = ['string', 123, 'aaa'];
echo "<pre>";
print_r($arr3);
echo "</pre>";

//lấy giá trị phần tử theo key hoặc dùng foreach
//2-Mảng kết hợp
//key sẽ ở dạng kết hợp cả dạng số và chuỗi

$arr5 = [
    'name' => "Manh",
    'diachi' => 'haNoi',
    'age' => 30,
    5 => 'test'
];
echo "<pre>";
print_r($arr5);
echo "</pre>";

//de lay gia tri cua ohan tu cung cos 2 cach quen thuoc
//lay theo key cua mang
echo $arr5['name']; //Manh

//dung foreach
foreach ($arr5 as $key => $value) {
    echo "key: $key value: $value";
    echo "\n";
}

//3- Mang da chieu
$arr6 = [
    'name' => 'Bon',
    'age' => 21,
    'class' => [
        'nameClass' => 'CNTT3',
        'count' => 68
    ]
]; //Mang 2 chieu

//lay ra gia tri cua mang thi van lay theo 2 cach;
//lay theo key
echo $arr6['class']['count']; //68
echo $arr6['name']; //Bon
//dung foreach

echo "\n";
foreach ($arr6 as $key => $value) {  //$key = name,age,class     
    //$value= Bon, 21, ['nameClass' => 'CNTT3','count' => 68]
    echo "key: $key";
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

//mang 3 chieu

$arr7 = [
    'name' => 'Bon',
    'age' => 21,
    'class' => [
        'nameClass' => 'CNTT3',
        'count' => [
            'count1' => 30,
            'count2' => 'hajak0',
        ]
    ]

];
echo "<pre>";
print_r($_SERVER);
echo "</pre>";