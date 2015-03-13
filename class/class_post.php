<?php
/*
 *日志管理页面
 *
 * */
require_once XABLOG_PATH.'/lib/class_mysql.php';
//require_once XABLOG_PATH.'/class/class_sort.php';
class post{
	/*
	 * 内部数据对象
	 * */
	private $db;

	public function __construct(){
		$this->db=new mysql_fun();
	}

	public function get_lastest_post(){
		$post=array();
		$sql="select * from xa_post order by post_date DESC LIMIT 5";
		$result=$this->db->query($sql);
		while ($info=$this->db->fetch_array($result)){
			$post[]=$info;
		}
		return $post;
	}
	/*
	 * 后台添加新日志
	 *
	 *
	 * */
	public function add_post($sort_id,$post_title,$post_content,$post_author,$post_count,$post_tag){
		$post_date=date("Y-m-d H:i:s");
		$post_type='';
		$post_views=0;
		$post_comments=0;
		$post_top='';
		$post_hide='';
		$sql="insert into xa_post values('','".$sort_id."','".$post_title."','".$post_date."','".$post_content."','".$post_author."','".$post_type."','".$post_views."','".$post_comments."','".$post_top."','".$post_hide."','".$post_count."','".$post_tag."')";
		if($this->db->query($sql)){
			$sqlstr="update xa_sort set post_num=post_num+1 where sort_id='".$sort_id."'";
			$this->db->query($sqlstr);
			return true;
		}else{
			return false;
		}
	}

	/*
	 * 更新日志
	 *
	 * */
	public function update_post($post_id,$sort_id,$post_title,$post_content,$post_author,$post_count,$post_tag){
		$post_date=date("Y-m-d H:i:s");
		$post_type='';
		$post_views=0;
		$post_comments=0;
		$post_top='';
		$post_hide='';
		$sql="update xa_post set sort_id='".$sort_id."',post_title='".$post_title."',post_date='".$post_date."',post_content='".$post_content."',post_author='".$post_author."',post_tag='".$post_tag."' where post_id='".$post_id."'";
		if($this->db->query($sql)){
			return true;
		}else{
			return false;
		}
	}

	/*
	 * 更新日志部分信息
	 *
	 * */
	function update_post_se($action,$post_id,$sort_id){
		switch ($action){
			case "changesort":
				$query=$this->db->query("select sort_id from xa_post where post_id='".$post_id."'");
				$sort=$this->db->fetch_row($query);
				$this->db->query("update xa_post set sort_id='".$sort_id."' where post_id='".$post_id."'");
				$this->db->query("update xa_sort set post_num=post_num-1 where sort_id='".$sort[0]."'");
				$this->db->query("update xa_sort set post_num=post_num+1 where sort_id='".$sort_id."'");
				break;
		}
	}


	/*
	 * 获取单篇日志
	 *
	 * */
	function get_post_only($post_id){
		$post=array();
		$sql="select * from xa_post where post_id='".$post_id."'";
		$query=$this->db->query($sql);
		while ($info=$this->db->fetch_array($query)){
			$post[]=$info;
		}
		$sort=new sort();
		$sort_name=$sort->get_sort_name($post[0]['sort_id']);
		$post[0]['post_count']=$sort_name[0];
		//echo "<script>alert(".$sort_name.");</script>";
		return $post;
	}

	/*
	 * 获取日志列表
	 *
	 * */
	public function get_post_list_front(){
		$post=array();
		$sql="select * from xa_post order by post_date DESC";
		$result=$this->db->query($sql);
		while ($info=$this->db->fetch_array($result)){
			$post[]=$info;
		}
		$sort=new sort();
		$length=count($post);
		for($i=0;$i<$length;$i++){
			$sort_name=$sort->get_sort_name($post[$i]['sort_id']);
			$post[$i]['post_count']=$sort_name[0];
		}
		return $post;
	}

	/*
	 * 删除日志
	 *
	 * */
	function del_post($post_id){
		//$sort=new sort();

		$query=$this->db->query("select sort_id from xa_post where post_id='".$post_id."'");
		$sort_id=$this->db->fetch_row($query);
		//echo $post_id;
		//评论
		$this->db->query("delete from xa_post where post_id='".$post_id."'");
		//标签
		//$this->db->query($sql);
		//分类
		$this->db->query("update xa_sort set post_num=post_num-1 where sort_id='".$sort_id[0]."'");

	}
	/*
	 * 获取日志ID
	 * */
	function get_post_id($post_title){
		$post=array();
		$query=$this->db->query("select post_id from xa_post where post_title='".$post_title."'");
		while ($result=$this->db->fetch_row($query)){
			$post[]=$result;
		}
		return $post;
	}
	/*
	 * 根据分类或者标签ID过滤日志
	 * */
	function get_post_con($sort_id,$tag_id,$con){
		if($con){
			$query=$this->db->query("select * from xa_post where sort_id='".$sort_id."'");
			while ($result=$this->db->fetch_array($query)){
				$post[]=$result;
			}
		}else {
			$tag=new tag();
			$query=$this->db->query("select p_id from xa_tag where tag_id='".$tag_id."'");
			$tags=$this->db->fetch_row($query);
			//echo $tags[0];
			$ids=@explode(',', $tags[0]);
			//print_r($ids);
			foreach ($ids as $item){
				if(!empty($item)){
					$query=$this->db->query("select * from xa_post where post_id='".$item."'");
					$post[]=$this->db->fetch_array($query);}
			}
		}
		$sort=new sort();
		$length=count($post);
		for($i=0;$i<$length;$i++){
			$sort_name=$sort->get_sort_name($post[$i]['sort_id']);
			$post[$i]['post_count']=$sort_name[0];
		}
		return $post;

	}
	/*
	 * 获取相邻日志
	 * */
	function get_nbpost($date){
		$nblog = array();
		$nblog['next'] = $this->db->once_fetch_array("SELECT post_title,post_id FROM xa_post WHERE post_date < '".$date."'  ORDER BY post_date DESC LIMIT 1");
		$nblog['prev'] = $this->db->once_fetch_array("SELECT post_title,post_id FROM xa_post WHERE post_date > '".$date."'  ORDER BY post_date LIMIT 1");
		return $nblog;
	}

	public function __destruct(){
		$this->db->close();
	}
}
?>