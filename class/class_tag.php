<?php
require_once XABLOG_PATH.'/lib/class_mysql.php';

class tag{
	private $db;

	public function __construct(){
		$this->db=new mysql_fun();
	}

	function get_tag(){
		$tag=array();
		$sql="select * from xa_tag order by tag_id";
		$result=$this->db->query($sql);
		while ($info=$this->db->fetch_array($result)){
			$tag[]=$info;
		}
		/*
		 foreach ($sort as $key=>$value){
			echo $value['sort_name'];
			}*/
		return $tag;
	}

	function add_tag($tag_name,$tag_des){
		//echo "<script>alert(".$tag_name.");</script>";
		$sql="insert into xa_tag values('','','".$tag_name."','".$tag_des."')";
		if($this->db->query($sql)){
			return true;
		}else {
			return false;
		}
	}

	function get_tag_byname($tag_name){
		$sql="select * from xa_tag where tag_name='".$tag_name."'";
		$result=$this->db->query($sql);
		$info=$this->db->fetch_array($result);
		if(!$info){
			return false;
		}else {
			return true;
		}
	}

	function update_tag_byname($tag_name,$p_id){
		$sql="update xa_tag set p_id=concat(p_id,'".$p_id.",') where tag_name='".$tag_name."'";
		if($this->db->query($sql))return true;
		else return false;
	}
	
	function update_tag($tag_id,$tag_name){
		$sql="update xa_tag set tag_name='".$tag_name."' where tag_id='".$tag_id."'";
		if($this->db->query($sql))return true;
		else return false;
	}
	
	function del_tag($tag_id){
		$sql="delete from xa_tag where tag_id='".$tag_id."'";
		if($this->db->query($sql))return true;
		else return false;
	}
	
	public function __destruct(){
		$this->db->close();
	}
}
?>