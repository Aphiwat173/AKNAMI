<?php
include '../config/class.php';
if(empty($_SESSION['id'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณาเข้าสู่ระบบ"));
}elseif(empty($_POST['idproduct'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่พบสินค้านี้"));
}else{
    $pluem = new classweb;
    $buy_product = $pluem->buy_product($_POST['idproduct']);
}
?>