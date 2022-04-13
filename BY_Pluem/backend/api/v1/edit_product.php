<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน"));
}elseif(empty($_POST['edit_name_product'] and $_POST['edit_image_product'] and $_POST['edit_details_product'] and $_POST['edit_item_product'] and $_POST['edit_price_product'] and $_POST['id_edit_product'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    $name = $_POST['edit_name_product'];
    $image = $_POST['edit_image_product'];
    $details = $_POST['edit_details_product'];
    $item = $_POST['edit_item_product'];
    $price = $_POST['edit_price_product'];
    $username = $_POST['edit_username_product'];
    $id = $_POST['id_edit_product'];
    $edit_product = $pluem->edit_product($name,$image,$details,$item,$price,$username,$id);
}
?>