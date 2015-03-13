<?php
require_once XABLOG_PATH.'/lib/class_mysql.php';

class link{
	private $db;

	public function __construct(){
		$this->db=new mysql_fun();
	}

	function get_link(){
		$link=array();
		$sql="select * from xa_link order by link_id";
		$result=$this->db->query($sql);
		while ($info=$this->db->fetch_array($result)){
			$link[]=$info;
		}
		return $link;
	}

	function add_link($link_name,$link_url,$link_des){
		//echo "<script>alert(".$tag_name.");</script>";
		$sql="insert into xa_link values('','".$link_name."','".$link_url."','".$link_des."')";
		if($this->db->query($sql)){
			return true;
		}else {
			return false;
		}
	}

	function get_link_byid($id){
		$sql="select * from xa_link where link_id='".$id."'";
		$result=$this->db->query($sql);
		while ($info=$this->db->fetch_array($result)){
			$link[]=$info;
		}
		return $link;
	}

	function del_link($link_id){
		$sql="delete from xa_link where link_id='".$link_id."'";
		if($this->db->query($sql))return true;
		else return false;
	}

	public function __destruct(){
		$this->db->close();
	}
}
?>