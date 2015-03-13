<?php
/*
 *
 *
 * */
require_once XABLOG_PATH.'/lib/class_mysql.php';
class sort{
	private $db;

	public function __construct(){
		$this->db=new mysql_fun();
	}

	function get_sort(){
		$sort=array();
		$sql="select * from xa_sort";
		$result=$this->db->query($sql);
		while ($info=$this->db->fetch_array($result)){
			$sort[]=$info;
		}
		/*
		 foreach ($sort as $key=>$value){
			echo $value['sort_name'];
			}*/
		return $sort;
	}

	function get_sort_name($sort_id){
		$sql="select sort_name from xa_sort where sort_id='".$sort_id."'";
		$query=$this->db->query($sql);
		$sort_name=$this->db->fetch_row($query);
		return $sort_name;
	}

	function get_sort_id($sort_name){
		$sql="select sort_id from xa_sort where sort_name='".$sort_name."'";
		$query=$this->db->query($sql);
		$sort_id=$this->db->fetch_row($query);
		return $sort_id;
	}

	function add_sort($sort_name,$sort_des){
		$sql="insert into xa_sort values('','".$sort_name."','".$sort_des."','0')";
		if (empty($sort_name)){return false;break;}
		if($this->db->query($sql)){
			return true;
		}else {
			return false;
		}
	}

	function del_sort($sort_id){
		$sql="delete from xa_sort where sort_id='".$sort_id."'";
		$this->db->query("update xa_post set sort_id='0' where sort_id='".$sort_id."'");
		$query=$this->db->query("select post_num from xa_sort where sort_id='".$sort_id."'");
		$post_num=$this->db->fetch_row($query);
		$this->db->query("update xa_sort set post_num=post_num+'".$post_num[0]."' where sort_id='0'");
		if($this->db->query($sql)){
			return true;
		}else{
			return false;
		}
	}

	function update_sort($sort_id,$sort_name){
		if ($this->db->query("update xa_sort set sort_name='".$sort_name."' where sort_id='".$sort_id."'")){
			return true;
		}else {
			return false;
		}
	}

	function get_sort_byname($sort_name){
		$sql="select * from xa_sort where sort_name='".$sort_name."'";
		$result=$this->db->query($sql);
		$info=$this->db->fetch_array($result);
		if(!$info){
			return false;
		}else {
			return true;
		}
	}

	public function __destruct(){
		$this->db->close();
	}
}
?>