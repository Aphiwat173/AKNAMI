<?php
require 'connect.php';
class classweb{
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
    public function show_product_limit(){
        $stmt = $this->db->prepare("SELECT * FROM product WHERE username = '0' ORDER BY id Limit 6");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
    }
    public function show_details($id){
		$stmt = $this->db->prepare("SELECT * FROM product WHERE id = :id");
		$stmt->execute([':id'=>$id]);
		$result = $stmt->fetch();
		return $result;
	}
	public function show_product(){
        $stmt = $this->db->prepare("SELECT * FROM product WHERE username = '0' ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
    }
	public function login($username,$password){
		$stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
		$stmt->execute([':username'=>$username]);
		$result = $stmt->fetch();
		if ($stmt->RowCount() > 0) {
			if ($password == $result['password']) {
				$_SESSION['id'] = $result['id'];
				$_SESSION['username'] = $result['username'];
                echo json_encode(array('status'=>"success",'message'=>"เข้าสู่ระบบสำเร็จ")); 
			}else{
                	echo json_encode(array('status'=>"error",'message'=>"รหัสผ่านไม่ถูกต้อง")); 
				}
		}else{
			echo json_encode(array('status'=>"error",'message'=>"ไม่พบชื่อผู้ใช้นี้"));
		}
	}
	public function register($username,$password){
		$stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
		$stmt->execute(array(':username'=>$username));
		if ($stmt->RowCount() > 0) {
			echo json_encode(array('status'=>"error",'message'=>"มีชื่อผู้ใช้นี้แล้ว"));
		}else{
			$inseart = $this->db->prepare("INSERT INTO `users` (`username`, `password`,`date`) VALUES (:username, :password,CURRENT_TIMESTAMP);");
			try {
				$inseart->execute([':username'=>$username,':password'=>$password]);
				$stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
				$stmt->execute([':username'=>$username]);
				$result = $stmt->fetch();
				$_SESSION['id'] = $result['id'];
				$_SESSION['username'] = $result['username'];
				echo json_encode(array('status'=>"success",'message'=>"สมัครสมาชิกสำเร็จ"));
			} catch (Exception $e) {
				echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
			}
		}
	}
	public function resultuser(){
		$stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
		$stmt->execute([':id'=>$_SESSION['id']]);
		$result = $stmt->fetch();
		return $result;
	}
	public function history_shop(){
		$stmt = $this->db->prepare("SELECT * FROM product WHERE username = :username");
		$stmt->execute([':username'=>$_SESSION['username']]);
		$result = $stmt->fetchAll();
		return $result;
	}
	public function buy_product($id){
		$resultuser = $this->resultuser();
		$stmt = $this->db->prepare("SELECT * FROM product WHERE id = :id");
		$stmt->execute([':id'=>$id]);
		$result = $stmt->fetch();
		if($resultuser['point'] < $result['price']){
			echo json_encode(array('status'=>"error",'message'=>"ยอดเงินไม่เพียงพอ"));
		}else{
			$updateproduct = $this->db->prepare("UPDATE `product` SET `username`= :username, `date` = CURRENT_TIMESTAMP  WHERE id = :id");
			$updatepoint = $this->db->prepare("UPDATE `users` SET `point`= point - :point WHERE id = :id");
			try {
				$updateproduct->execute([':username'=>$_SESSION['username'],':id'=>$id]);
				$updatepoint->execute([':point'=>$result['price'],':id'=>$_SESSION['id']]);
				echo json_encode(array('status'=>"success",'message'=>"ซื้อสินค้าสำเร็จ สามารถดูได้ที่ประวัติการซื้อสินค้า"));
			} catch (Exception $e) {
				echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
			}
		}
	}
	public function topup($link_topup){
		$web_config = $this->web_config();
		$phone = $web_config['phone'];
		$curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://103.141.68.26/api/free/'.$link_topup.'/'.$phone,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
		curl_close($curl);
		$result = json_decode($response);

		$codestatus = $result->code;
		$message = $result->message;
		$status = $result->status;
		if ($codestatus =="200"){
			$amount = $result->data->amount;
			$name = $result->data->name;
			$update = $this->db->prepare("UPDATE users SET point = point + :point WHERE id = :id");
			$inserttopup = $this->db->prepare("INSERT INTO `history_topup` (`username`, `name`, `amount`, `link`, `status`, `date`) VALUES (:username, :name, :amount, :link, :status, CURRENT_TIMESTAMP);");
			try {
				$inserttopup->execute([':username'=>$_SESSION['username'], ':name'=>$name, ':amount'=>$amount,':link'=>$link_topup,':status'=>"0"]);
				$update->execute([':point'=>$amount,':id'=>$_SESSION['id']]);
				echo json_encode(array('status'=>$status,'message'=>$message));
			} catch (Exception $e) {
				echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
			}
		}else{
			echo json_encode(array('status'=>$status,'message'=>$message));
		}
	}
}
?>