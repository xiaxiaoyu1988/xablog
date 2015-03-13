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

$link=new link();
$smarty->assign('title','链接管理');
//$smarty->assign('result',$result);
$smarty->assign('path',$path);
$userdata=get_userdata();
$user=explode('@', $userdata);
$smarty->assign('userdata',$user[0]);
$smarty->assign('userface',$user[1]);
if($action==''){
	$linkdata=array();
	$flag=4;
	$linkdata=$link->get_link();
}

if($action=='addlink'){
	$link_name=$_POST['link_name'];
	$link_url='http://'.$_POST['link_url'];
	$link_des=$_POST['link_des'];

	$link->add_link($link_name, $link_url, $link_des);
	update_front_widgets();
	$link->__construct();
	$linkdata=$link->get_link();
	$flag=1;
}
if($action=='dellink'){
	$link_id=$_GET['link_id'];
	if($link->del_link($link_id)){
		$linkdata=$link->get_link();
		$flag=0;
	}
}

$smarty->assign('flag',$flag);
$smarty->assign('linkdata',$linkdata);
$smarty->display('admin_index.tpl');
if($action == 'link_edit'){
	$id=$_GET['id'];
	$link_data=$link->get_link_byid($id);
	$smarty->assign('link_data',$link_data);
	$smarty->display('linkedit.tpl');
}else{
	$smarty->display('link.tpl');
}
$smarty->display("footer.tpl");
?>