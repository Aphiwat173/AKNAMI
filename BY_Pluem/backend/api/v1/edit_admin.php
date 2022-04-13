<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน"));
}elseif(empty($_POST['edit_user_admin'] and $_POST['edit_pass_admin'] and $_POST['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    $username = $_POST['edit_user_admin'];
    $passdword = $_POST['edit_pass_admin'];
    $id_admin = $_POST['id_admin'];
    $edit_user = $pluem->edit_admin($username,$passdword,$id_admin);
}
?>