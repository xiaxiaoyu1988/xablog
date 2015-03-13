<?php
/*
 *
 *
 * */
require_once 'global.php';
$action=$_GET['action'];
$sort_id=$_GET['sort_id'];
$tag_id=$_GET['tag_id'];
$path=XABLOG_URL.'view/';
if(!chklogin()&&!islogin()){
	header('Location:index.php?action=login');
}

$obj=new sort();
$post=new post();
$tag=new tag();

$smarty->assign('title','管理首页');
//$smarty->assign('result',$result);
$smarty->assign('path',$path);
$smarty->assign("url",XABLOG_URL);
$userdata=get_userdata();
$user=explode('@', $userdata);
$sort=array();
$postdata=array();
$flag=4;
$tagdata=$tag->get_tag();
$sortdata=$obj->get_sort();
$smarty->assign('userdata',$user[0]);
$smarty->assign('userface',$user[1]);
if($action==''){
	$postdata=$post->get_post_list_front();
}
if($action=='list_by_sort'){
	//echo $sort_id;
	$postdata=$post->get_post_con($sort_id,'', 1);
	//print_r($postdata);
}
if($action=='list_by_tag'){
//	echo $tag_id;
	$postdata=$post->get_post_con('',$tag_id, 0);
	//print_r($postdata);
}
$smarty->assign('tagdata',$tagdata);
$smarty->assign('postdata',$postdata);
$smarty->assign('sortdata',$sortdata);
$smarty->assign('flag',$flag);
$smarty->display('admin_index.tpl');
$smarty->display('post.tpl');
$smarty->display("footer.tpl");
?>