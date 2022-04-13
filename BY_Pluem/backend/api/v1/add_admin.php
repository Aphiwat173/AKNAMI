<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน"));
}elseif(empty($_POST['add_user_admin'] and $_POST['add_pass_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    $add_admin = $pluem->add_admin($_POST['add_user_admin'],$_POST['add_pass_admin']);
}
?>