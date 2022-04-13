<?php
require 'connect.php';
class classadmin {
    function __construct()
	{
		$this->db = database();
	}
	public function web_config(){
		$stmt = $this->db->prepare("SELECT * FROM web_config WHERE id = '1'");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function login($username,$password){
		$stmt = $this->db->prepare("SELECT * FROM tbl_admin WHERE username = :username");
		$stmt->execute([':username'=>$username]);
		$result = $stmt->fetch();
		if ($stmt->RowCount() > 0) {
			if ($password == $result['password']) {
				$_SESSION['id_admin'] = $result['id'];
				$_SESSION['username_admin'] = $result['username'];
				$updatedate = $this->db->prepare("UPDATE `tbl_admin` SET `date`= CURRENT_TIMESTAMP  WHERE id = :id");
				$updatedate->execute([':id'=>$_SESSION['id_admin']]);
                echo json_encode(array('status'=>"success",'message'=>"เข้าสู่ระบบสำเร็จ")); 
			}else{
                	echo json_encode(array('status'=>"error",'message'=>"รหัสผ่านไม่ถูกต้อง")); 
				}
		}else{
			echo json_encode(array('status'=>"error",'message'=>"ไม่พบชื่อผู้ใช้นี้"));
		}
	}
	public function totaluser(){
		$stmt = $this->db->prepare("SELECT count(id) as total FROM users");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function totaltopup(){
		$stmt = $this->db->prepare("SELECT sum(amount) as total FROM history_topup");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function totalproduct(){
		$stmt = $this->db->prepare("SELECT count(id) as total FROM product WHERE username = '0'");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function totalproduct_(){
		$stmt = $this->db->prepare("SELECT count(id) as total FROM product WHERE username != '0'");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function show_user(){
		$stmt = $this->db->prepare("SELECT * FROM users ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	public function showedit_user($id){
		$stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
		$stmt->execute([':id'=>$id]);
		$result = $stmt->fetch();
		return $result;
	}
	public function show_admin(){
		$stmt = $this->db->prepare("SELECT * FROM tbl_admin ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	public function showedit_admin($id){
		$stmt = $this->db->prepare("SELECT * FROM tbl_admin WHERE id = :id");
		$stmt->execute([':id'=>$id]);
		$result = $stmt->fetch();
		return $result;
	}
	public function edit_user($username,$passdword,$point,$id_user){
		$updateuser = $this->db->prepare("UPDATE `users` SET `username` = :username, `password` = :password, `point` = :point WHERE id = :id");
		try {
			$updateuser->execute([':username'=>$username,':password'=>$passdword,':point'=>$point,':id'=>$id_user]);
			echo json_encode(array('status'=>"success",'message'=>"แก้ไขข้อมูลสำเร็จ"));
		} catch (Exception $e) {
			echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
		}
	}
	public function add_user($username,$passdword,$point){
		$stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
		$stmt->execute([':username'=>$username]);
		if ($stmt->RowCount() > 0) {
			echo json_encode(array('status'=>"error",'message'=>"มีชื่อผู้ใชนี้แล้ว"));
		}else{
			$add_admin = $this->db->prepare("INSERT INTO `users` (`username`, `password`, `point`) VALUES (:username, :password, :point);");
			try {
				$add_admin->execute([':username'=>$username,':password'=>$passdword,':point'=>$point]);
				echo json_encode(array('status'=>"success",'message'=>"เพิ่มข้อมูลสำเร็จ"));
			} catch (Exception $e) {
				echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
			}
		}
	}
	public function edit_admin($username,$passdword,$id_admin){
		$updateadmin = $this->db->prepare("UPDATE `tbl_admin` SET `username` = :username, `password` = :password WHERE id = :id");
		try {
			$updateadmin->execute([':username'=>$username,':password'=>$passdword,':id'=>$id_admin]);
			echo json_encode(array('status'=>"success",'message'=>"แก้ไขข้อมูลสำเร็จ"));
		} catch (Exception $e) {
			echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
		}
	}
	public function add_admin($username,$passdword){
		$stmt = $this->db->prepare("SELECT * FROM tbl_admin WHERE username = :username");
		$stmt->execute([':username'=>$username]);
		if ($stmt->RowCount() > 0) {
			echo json_encode(array('status'=>"error",'message'=>"มีชื่อผู้ใชนี้แล้ว"));
		}else{
			$add_admin = $this->db->prepare("INSERT INTO `tbl_admin` (`username`, `password`) VALUES (:username, :password);");
			try {
				$add_admin->execute([':username'=>$username,':password'=>$passdword]);
				echo json_encode(array('status'=>"success",'message'=>"เพิ่มข้อมูลสำเร็จ"));
			} catch (Exception $e) {
				echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
			}
		}
	}
	public function del_user($id){
		$del_user = $this->db->prepare("DELETE FROM `users` WHERE id = :id");
		$del_user->execute([':id'=>$id]);
		echo json_encode(array('status'=>"success",'message'=>'ลบผู้ใช้หมายเลข '.$id.' สำเร็จ'));
	}
	public function del_admin($id){
		$del_user = $this->db->prepare("DELETE FROM `tbl_admin` WHERE id = :id");
		$del_user->execute([':id'=>$id]);
		echo json_encode(array('status'=>"success",'message'=>'ลบผู้ดูแลระบบหมายเลข '.$id.' สำเร็จ'));
	}
	public function history_topup(){
		$stmt = $this->db->prepare("SELECT * FROM history_topup ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	public function history_product(){
		$stmt = $this->db->prepare("SELECT * FROM product WHERE username != '0' ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	public function show_product(){
		$stmt = $this->db->prepare("SELECT * FROM product ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	public function showedit_product($id){
		$stmt = $this->db->prepare("SELECT * FROM product WHERE id = :id");
		$stmt->execute([':id'=>$id]);
		$result = $stmt->fetch();
		return $result;
	}
	public function edit_product($name,$image,$details,$item,$price,$username,$id){
		$updateproducts = $this->db->prepare("UPDATE `product` SET `name` = :name, `image` = :image, `details` = :details, `item` = :item, `price` = :price, `username` = :username WHERE id = :id");
		try {
			$updateproducts->execute([':name'=>$name,':image'=>$image,':details'=>$details,':item'=>$item,':price'=>$price,':username'=>$username,':id'=>$id]);
			echo json_encode(array('status'=>"success",'message'=>"แก้ไขข้อมูลสำเร็จ"));
		} catch (Exception $e) {
			echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
		}
	}
	public function del_product($id){
		$del_user = $this->db->prepare("DELETE FROM `product` WHERE id = :id");
		$del_user->execute([':id'=>$id]);
		echo json_encode(array('status'=>"success",'message'=>'ลบผู้สินค้าบบหมายเลข '.$id.' สำเร็จ'));
	}
	public function add_product($name,$image,$details,$item,$price){
		$add_product = $this->db->prepare("INSERT INTO `product` (`name`, `image`, `details`, `item`, `price`) VALUES (:name, :image, :details, :item, :price);");
		try {
			$add_product->execute([':name'=>$name,':image'=>$image,':details'=>$details,':item'=>$item,':price'=>$price]);
			echo json_encode(array('status'=>"success",'message'=>"เพิ่มข้อมูลสำเร็จ"));
		} catch (Exception $e) {
			echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
		}
	}
	public function show_web(){
		$stmt = $this->db->prepare("SELECT * FROM web_config WHERE id = 1");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function settings_web($title,$logo,$contact,$phone){
		$settings_web = $this->db->prepare("UPDATE `web_config` SET `title` = :title, `logo` = :logo, `contact` = :contact, `phone` = :phone WHERE id = 1");
		try {
			$settings_web->execute([':title'=>$title,':logo'=>$logo,'contact'=>$contact,'phone'=>$phone]);
			echo json_encode(array('status'=>"success",'message'=>"แก้ไขข้อมูลสำเร็จ"));
		} catch (Exception $e) {
			echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
		}
	}
}
?>