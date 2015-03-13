<?php
/*
 *用户管理
 *
 * */
require_once XABLOG_PATH.'/lib/class_mysql.php';
class user{
	/*
	 * 内部数据对象
	 * */
	private $db;

	public function __construct(){
		$this->db=new mysql_fun();
	}

	function update_user($user_email,$user_des,$user_face){
		$user_id=1;
		$sql="update xa_user set user_email='".$user_email."',user_des='".$user_des."',user_face='".$user_face."' where user_id = '".$user_id."'";
		if($this->db->query($sql)){
			return true;
		}else {
			return false;
		}
	}

	function get_user(){
		$user=array();
		$sql="select * from xa_user ";
		$query=$this->db->query($sql);
		while($info=$this->db->fetch_array($query)){
			$user[]=$info;
		}
		return $user;
	}
	function check_user($pwd){
		$sql="select * from xa_user where user_pwd='".$pwd."'";
		$chk=$this->db->fetch_array($this->db->query($sql));
		if(!$chk){
			return true;
		}
		else{
			return false;
		}
	}
	function update_pwd($pwd){
		$sql="update xa_user set user_pwd='".$pwd."'";
		if($this->db->query($sql)){
			return true;
		}else {
			return true;
		}
	}
	function update_des($des)
	{
		$sql="update xa_user set user_des='".$des."'";
		if($this->db->query($sql)){
			return true;
		}else {
			return true;
		}

	}
	public function __destruct(){
		$this->db->close();
	}
}
?>