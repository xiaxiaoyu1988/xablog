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

$tag=new tag();
$userdata=get_userdata();
$user=explode('@', $userdata);
$smarty->assign('userdata',$user[0]);
$smarty->assign('userface',$user[1]);
$smarty->assign('title','标签');
$smarty->assign('path',$path);

if($action==''){
	$flag=4;
	$tagdata=$tag->get_tag();

}
if($action=='addtag'){
	$tag_name=$_POST['tag_name'];
	$tag_des=$_POST['tag_des'];

	if($tag->get_tag_byname($tag_name)||empty($tag_name)){
		$flag=2;
	}else {
		$tag->add_tag($tag_name, $tag_des);
		$flag=1;
	}
	$tagdata=$tag->get_tag();
}
if($action=='deltag'){
	$tag_id=$_GET['tag_id'];
//	echo $tag_id;
	if($tag->del_tag($tag_id)){
		$tagdata=$tag->get_tag();
		$flag=0;
	}
}

$smarty->assign('tagdata',$tagdata);
$smarty->assign('flag',$flag);
$smarty->display('admin_index.tpl');
$smarty->display('tag.tpl');
$smarty->display("footer.tpl");
?>