<?php
include '../../config/class.php';
$pluem = new classadmin;
if (empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>'มึงไม่ใช่แอดมินไอ่สัส'));
}elseif (empty($_POST['id_del_admin'])) {
	echo json_encode(array('status'=>"error",'message'=>'ไม่พบผู้ใช้'));
}else{
	$del_admin = $pluem->del_admin($_POST['id_del_admin']);
}
?>