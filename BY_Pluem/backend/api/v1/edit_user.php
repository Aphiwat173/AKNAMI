<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน"));
}elseif(empty($_POST['edit_user_user'] and $_POST['edit_pass_user'] and $_POST['edit_point_user'] and $_POST['id_user'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    $username = $_POST['edit_user_user'];
    $passdword = $_POST['edit_pass_user'];
    $point = $_POST['edit_point_user'];
    $id_user = $_POST['id_user'];
    $edit_user = $pluem->edit_user($username,$passdword,$point,$id_user);
}
?>