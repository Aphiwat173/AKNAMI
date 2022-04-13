<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน")); 
}elseif(empty($_POST['title_web'] and $_POST['logo_web'] and $_POST['contact_web'] and $_POST['phone_web'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    $pluem = new classadmin;
    $title = $_POST['title_web'];
    $logo = $_POST['logo_web'];
    $contact = $_POST['contact_web'];
    $phone = $_POST['phone_web'];
    $settings_web = $pluem->settings_web($title,$logo,$contact,$phone);
}
?>