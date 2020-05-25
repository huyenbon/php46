<?php
//------ham tren thuoc ham tuan tu
//code

$arr = ['đỏ', 'xanh', 'cam', 'trắng'];

?>
<style>
span {
    color: red;
    font-weight: 700;
}
</style>

<p>
    Mau <span><?php echo $arr[0]; ?></span> là màu yêu thích của Anh,
    <span><?php echo $arr[3]; ?></span> là màu yêu thích của Sơn,
    <span><?php echo $arr[2]; ?></span> là màu yêu thích của Thắng,
    còn màu yêu thích của tôi là màu <span><?php echo $arr[3]; ?></span>
</p>