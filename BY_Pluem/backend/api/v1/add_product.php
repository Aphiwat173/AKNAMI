<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน"));
}elseif(empty($_POST['add_name_product'] and $_POST['add_image_product'] and $_POST['add_details_product'] and $_POST['add_item_product'] and $_POST['add_price_product'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    $name = $_POST['add_name_product'];
    $image = $_POST['add_image_product'];
    $details = $_POST['add_details_product'];
    $item = $_POST['add_item_product'];
    $price = $_POST['add_price_product'];
    $add_product = $pluem->add_product($name,$image,$details,$item,$price);
}
?>