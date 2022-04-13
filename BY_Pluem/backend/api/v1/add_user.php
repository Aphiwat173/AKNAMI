<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน"));
}elseif(empty($_POST['add_user_user'] and $_POST['add_pass_user'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    $username = $_POST['add_user_user'];
    $passdword = $_POST['add_pass_user'];
    $point = $_POST['add_point_user'];
    $add_user = $pluem->add_user($username,$passdword,$point);
}
?>