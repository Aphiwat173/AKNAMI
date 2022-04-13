<?php
if(empty($_POST['username'] and $_POST['password'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    include '../config/class.php';
    $pluem = new classweb;
    $login = $pluem->login($_POST['username'],$_POST['password']);
}
?>