<?php
require_once XABLOG_PATH.'/lib/class_mysql.php';

class comment{
	private $db;

	public function __construct(){
		$this->db=new mysql_fun();
	}

	function get_comment(){
		$comment=array();
		$sql="select * from xa_comment  order by comment_id";
		$result=$this->db->query($sql);
		while ($info=$this->db->fetch_array($result)){
			$comment[]=$info;
		}
		return $comment;
	}
	function get_comment_byid($post_id){
		$comment=array();
		$sql="select * from xa_comment where post_id='".$post_id."' and comment_hide='0'";
		$result=$this->db->query($sql);
		while ($info=$this->db->fetch_array($result)){
			$comment[]=$info;
		}
		return $comment;
	}

	function update_comment($comment_id, $stat){
		$sql="update xa_comment set comment_hide = '".$stat."' where comment_id = '".$comment_id."'";
		if($this->db->query($sql)){
			return true;
		}else {
			return false;
		}
	}

	function get_comments($post_id){
		$sql = "select count(*) from xa_comment where post_id='".$post_id."'";
		$result=$this->db->query($sql);
		$info=$this->db->fetch_row($result);
		return $info[0];
	}

	function add_comment($post_id,$comment_poster,$comment_email,$comment_url,$comment_content){
		//echo "<script>alert(".$tag_name.");</script>";
		$comment_replys = 0;
		$comment_hide = 0;
		$comment_ip = 0;
		$comment_date = date("Y-m-d H:i:s");
		$sql="insert into xa_comment values('','".$post_id."','".$comment_poster."','".$comment_content."','".$comment_replys."','".$comment_hide."','".$comment_email."','".$comment_ip."','".$comment_url."','".$comment_date."')";
		$adsql="update xa_post set post_comments = post_comments+1 where post_id = '".$post_id."'";
		$this->db->query($adsql);
		if($this->db->query($sql)){
			return true;
		}else {
			return false;
		}
	}

	function del_comment($comment_id){
		$sql="delete from xa_comment where comment_id='".$comment_id."'";
		if($this->db->query($sql))return true;
		else return false;
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