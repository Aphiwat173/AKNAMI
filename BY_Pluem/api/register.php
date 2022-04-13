<?php
if(empty($_POST['username'] and $_POST['password'] and $_POST['confirmpassword'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}elseif($_POST['password'] !== $_POST['confirmpassword']){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกรหัสผ่านให้ตรงกัน"));
}else{
    include '../config/class.php';
    $pluem = new classweb;
    $register = $pluem->register($_POST['username'],$_POST['password']);
}
?>