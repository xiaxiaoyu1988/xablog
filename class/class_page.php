<?php
require_once XABLOG_PATH.'/lib/class_mysql.php';

class page{
	private $db;

	public function __construct(){
		$this->db=new mysql_fun();
	}

	function get_page(){
		$page=array();
		$sql="select * from xa_page ";
		$result=$this->db->query($sql);
		while ($info=$this->db->fetch_array($result)){
			$page[]=$info;
		}
		return $page;
	}
	
	function get_page_bytitle($page_tilte){
		$page=array();
		$sql="select * from xa_page where page_title='".$page_tilte."'";
		$result=$this->db->query($sql);
		while ($info=$this->db->fetch_array($result)){
			$page[]=$info;
		}
		return $page;
	}
	
	function del_page($page_id){
		$sql="delete from xa_page where page_id = '".$page_id."'";
		if($this->db->query($sql)){
			return true;
		}else {
			return false;
		}
	}
	
	function add_page($page_title,$page_content){
		$page_date=date("Y-m-d H:i:s");
		$page_hide='';
		$sql="insert into xa_page values('','".$page_title."','".$page_date."','".$page_content."','".$page_hide."')";
		if($this->db->query($sql)){
			return true;
		}else {
			return false;
		}
	}
	/*
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
		*/
	public function __destruct(){
		$this->db->close();
	}
}
?>