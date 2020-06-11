<?php
//mot so phuong phap lap trinh
//1- lap trinh kieu tuyen tinh: nghi gi viet naay
//vd:
//2- lap trinh co cau truc - da biet chia cac chuc nang thanh cac ham
$number1 = 1;
$number2 = 2;
function sum($number1, $number2)
{
    return $number1 + $number2;
}
echo sum($number1, $number2); //3

//3 lap trinh huong doi tuong
//-lay doi tuong lam trong tam de phan tich va dua ra ca thuoc tinh va phuong thuc co the co cua doi tuong do

//4 -Demo cac thuat ngu cua lap trinh huong doi tuong
//+ class - lop
//Nhu 1 khuon mau, vd php46 se co cac ban A
//doi tuong A, tat ca cac doi tuong trong 1 lop deu co nhưng dac diem gi do
class person
{
}

class animal
{
}
//-object - doi tuong - chính là các thể hiện cụ thể của class
class personA
{
    public $name;
    public $age;

    //khai bao phuong thuc trong class
    public function run()
    {
        echo "run";
    }
}
//khoi tao doi tuong tu class, doi tuong se thua ke tat ca cac thuoc tinh va phuong thuc cua class do
$obj_a = new personA();
//set name va age cho doi tuong vua khoi tao, va goi phuong thuc run tren doi tuong nay

$obj_a->name = "Bon";
$obj_a->age = 30;
$obj_a->run(); // run;
//tu khoa this - the hien cho chinh doi tuong (class, object)
class thisDemo
{
    public $name;
    public $age;

    public function getName()
    {
        //this se su dung chinh class hien tai de truy cap vao thuoc tinh name cua no
        echo "Name: " . $this->name;
    }
}
$obj_this_demo = new thisDemo();
$obj_this_demo->name = "Bon";
$obj_this_demo->getName(); //Name: Bon

//+Pham vi truy cap: phan quyen truy cap vao thuoc tinh va phuong thuc cua class
//private: chi class do moi co the truy cap duoc, cac doi tuong khoi tao tu class nay cung ko the truy cap duoc
//protected: chi class do va cac class ke thua tu class do moi truy cap dc
//public: tu do truy cap

class privateTest
{
    private $name;
    public $age;
    private function show()
    {
        //chi truy cap duoc trong noi bo class do
        $this->name = "Bon";
        echo "show private";
    }
}
$obj_private_test = new privateTest();

//co tinh truy cap thuoc tinh private se bao loi
//$obj_private_test->name = "Bon";

class protectedTest
{
    protected $name;
    public $age;
    private function show()
    {
        //chi truy cap duoc trong noi bo class do
        $this->name = "Bon";
        echo "show private";
    }
}

class ChildProtected extends protectedTest
{
    public function showName()
    {
        //co the truy cap thuoc tinh/ phuong thuc protected tu class cha
        echo $this->name;
    }
}
$bj_protected = new protectedTest();
//co tinh truy cap protected tu doi tuong se bao loi
//$obj_protected ->name ="bon";'

//thong thuong , de cho don gian thi se khai bao tat ca phuong thuc va thuoc tinh public

class publicTest
{
    public $name;
    public $age;
    public function getName()
    {
        echo $this->name;
    }
}
//thuoc tinh cua class
//phuong thuc cua lop

//phuong thuc khoi tao cua lop -la phuong thuc duoc chay mac dinh dau tien khi khoi tao doi tuong tu class,
//ke ca khong can goi tuong minh

class ConstructorTest
{
    public function __construct()
    {
        echo "Dong nay luon chay dau tien khi khoi tao doi tuong tu class";
    }

    public function show()
    {
        echo "phuong thuc thong thuong thi can phai co buoc goi tu doi tuong";
    }
}
$obj_constructor = new ConstructorTest();
//Dong nay luon chay dau tien khi khoi tao doi tuong tu class

//tu khoa static - 1 thuoc tinh hoac phuong thuc ma khong can khoi tao doi tuong bang cach khai bao cho n tu khoa static

class staticTest
{
    public static $name;
    public static function show()
    {
        echo "show";
    }
}

//truy cap thuoc tinh/ phuong thuc tinh bang cu phap
//Ten-class::ten-thuoc-tinh-tinh/phuong-thuc-tinh
staticTest::$name = "Bon";
staticTest::show();
//ke thua - extends - class con se ke thua tat ca cac thuoc tinh va phuong thuc cua class cha ma dang o pham vi truy cap protected va public , PHP chi ho tro don ke thua - 1 class chi ke thua 1 class khac tai 1 thoi diem

class ExtendPerson
{
    public $name;
    public $age;
    public $address;
    public function show()
    {
        echo "show";
    }
}
class ExtenChild extends ExtendPerson
{
    //class ExtenChild co the truy cap duoc tat ca cac thuoc tinh phuong thuc protected va public cua claass ExtendPerson
    public $class;
    public function child(){}
}
$obj_child = new ExtenChild();
$obj_child->name = "bon";
$obj_child->age = 18;

//abstract - the hien cho tinh truu tuong cua 1 class
abstract class AbstractTest{
    public $name;
    public $age;
    public function show(){

    }
    abstract public function getName();
}
//interface - 1 bo khung 
interface InterfaceTest{
    //public $name;
    public function getName();
    public function showAge();

}
class A implements InterfaceTest{
    public function getName(){
        
    }
    public function showAge(){

    }
}