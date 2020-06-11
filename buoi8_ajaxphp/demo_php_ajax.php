<?php
// co che ajax trong PHP - la co che khong dong bo, su dung javascript
//co che nay cho phep php thao tac voi CSDL (CRUD) ma khong he tai lai trang, tang trai nghiem ve mat nguoi dung vi toc doc trang se nhanh hon
//Ajax trong PHP thuong se su dung thu vien jQuery de viet, chu khong dung JS thuan
?>
<!-- tich hop jquery vao he thong de goi ajax -->
<script src="js/jquery-1.8.3.min.js"></script>
<a href="#" id="click-ajax"> click de lay danh sach</a>
<!-- // khai bao 1 the voi noi dung rong, de do du lieu sinh vien vao tu ajax tra ve -->
<div id="result" style="background-color: pink;"></div>
<script type="text/javascript">
//goi ajax voi jquery
var obj_ajax = {
    //url dung de xu ly du lieu tu ajax gui len
    url: 'list_student.php',
    //phuong thuc truyen du lieu
    method: 'GET',
    //danh sach du lieu gui len
    //chi la demo do chuc nang lay ds sinh vien thi ko can tham so gi ca
    data: {
        'name': 'BON',
        'id': 4,
    },
    //la noi don ket qua tra ve sau khi php xu ly xong va ket qua se duoc luu boi tham so data cua ham
    success: function(data) {
        // console.log(data);
        //dung query hien thi data ra vi tri mong muon
        $('#result').html(data);
    }


}
$('#click-ajax').click(function() {
    //goi ajax sau khi click
    $.ajax(obj_ajax);

});
</script>