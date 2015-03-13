<?php
/*
 * ajax后台处理过程
 *
 * */
require_once 'global.php';
$action=$_POST['action'];
$post_id=$_POST['post_id'];


$post=new post();
$obj=new sort();
$user=new user();
$cache=new cache();
$tag=new tag();
$link=new link();
$page=new page();
$comment=new comment();
if($action=='updatelog'){
	$sort=array();
	$sort=$obj->get_sort();
	$sort_id=$_POST['sort_name'];
	$post_title=$_POST['title'];
	$post_content=$_POST['content'];
	$user=explode('@', get_userdata());
	$post_author=$user[0];
	$post_count='';
	$post_tag=$_POST['tag'];
	//echo $post_title.$post_content.$post_pwd;
	if($post->update_post($post_id,$sort_id, $post_title, $post_content, $post_author, $post_count, $post_tag)){
		echo "1";
		//$smarty->assign('flag',$flag);
		//$smarty->display("edit.tpl");
	}
	else {
		echo "2";
	}

}

if($action=='dellog'){
	$del_id=$_POST['del_id'];
	$post_id=explode(",", $del_id);

	foreach ($post_id as $val){
		$post->del_post($val);
		//echo $val.'+';
	}
}

if($action=='changesort'){
	$change_id=$_POST['change_id'];
	$sort_id=$_POST['sort_id'];
	$post_id=explode(",", $change_id);

	foreach ($post_id as $val){
		$post->update_post_se($action, $val,$sort_id);
		//echo $val.'+';
	}
	//echo "test";
}

if($action=='update_sort'){
	$sort_id=$_POST['sort_id'];
	$sort_name=$_POST['sort_name'];
	//echo $sort_id.$sort_name;
	$obj->update_sort($sort_id, $sort_name);
}

if($action=='update_tag'){
	$tag_id=$_POST['tag_id'];
	$tag_name=$_POST['tag_name'];
	//echo $sort_id.$sort_name;
	$tag->update_tag($tag_id, $tag_name);
}

if($action=='update_pwd'){
	$pwd_old=$_POST['pwd_old'];
	$pwd_new=$_POST['pwd_new'];

	if($user->check_user($pwd_old)){
		echo "原始密码输入错误，请检查";
	}else{
		$user->update_pwd($pwd_new);
		echo "密码更新成功！！！";
	}
}

if($action=='update_w'){
	$str=$_POST['str'];
	if($cache->admin_cache($str, "w_list")){
		update_front_widgets();
	}else{
		echo 0;
	}
}

if($action=='update_diy'){
	$str=$_POST['str'];
	$content=$_POST['content'];
	$name=$_POST['name'];
	if($_POST['del']=='del'){
		del_option($name);
	}
	else{
		add_option($name, $content);
	}
	if($cache->admin_cache($str, "diy_list")){
		echo "更新成功";
	}else{
		echo "更新失败";
	}
}

if($action=='add_tag'){
	$tag_name=$_POST['tag_name'];
	//echo $tag_name;
	$tag_des='';
	if($tag->get_tag_byname($tag_name)){
		return false;
	}
	else{
		$tag->add_tag($tag_name, $tag_des);
	}
}

if($action=='update_user'){
	$user_des=$_POST['user_des'];
	$user->update_des($user_des);
	echo $user_des;
}

if($action == 'update_link'){
	$link_id=$_POST['link_id'];
	$link_url=$_POST['link_url'];

}

if($action == 'plugin'){
	$stat=$_POST['stat'];
	$key=$_POST['key'];
	if($stat == 1){
		echo "ac".$key;
		$plugin= new xaplugin($key);
		$plugin->active_plugin($active_plugins);
	}else {
		echo "in";
		$plugin= new xaplugin($key);
		$plugin->inactive_plugin($active_plugins);
	}
}

if($action == 'addpage'){
	$page_title=$_POST['title'];
	$page_content=$_POST['content'];
	$page->add_page($page_title, $page_content);
	echo '1';
}

if($action == 'updatecomm'){
	$comment_id=$_POST['comment_id'];
	$stat=$_POST['stat'];
	$comment->update_comment($comment_id, $stat);
	echo '22';
}

update_front_widgets();
?>