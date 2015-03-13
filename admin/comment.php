<?php
/*
 *
 *
 * */
require_once 'global.php';
$action=$_GET['action'];
$path=XABLOG_URL.'view/';
if(!chklogin()&&!islogin()){
	header('Location:index.php?action=login');
}

$comment=new comment();
$smarty->assign('title','评论管理');
//$smarty->assign('result',$result);
$smarty->assign('path',$path);
$userdata=get_userdata();
$user=explode('@', $userdata);
$smarty->assign('userdata',$user[0]);
$smarty->assign('userface',$user[1]);
if($action==''){
	$linkdata=array();
	$flag=4;
	$commentdata=$comment->get_comment();
}

if($action=='delcomm'){
	$comment_id=$_GET['comment_id'];
	if($comment->del_comment($comment_id)){
		$commentdata=$comment->get_comment();
		$flag=0;
	}
}

$smarty->assign('flag',$flag);
$smarty->assign('commentdata',$commentdata);
$smarty->display('admin_index.tpl');
$smarty->display('comment.tpl');
$smarty->display("footer.tpl");
?>