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

$page=new page();
$smarty->assign('title','页面管理');
//$smarty->assign('result',$result);
$smarty->assign('path',$path);
$userdata=get_userdata();
$user=explode('@', $userdata);
$smarty->assign('userdata',$user[0]);
$smarty->assign('userface',$user[1]);
if($action==''){
	$pagedata=array();
	$flag=4;
	$pagedata=$page->get_page();
}

if($action=='addpage'){

}
if($action=='delpage'){
	$page_id=$_GET['page_id'];
	if($page->del_page($page_id)){
		$pagedata=$page->get_page();
		$flag=0;
	}
}

$smarty->assign('flag',$flag);
$smarty->assign('pagedata',$pagedata);
$smarty->display('admin_index.tpl');
$smarty->display('page.tpl');
$smarty->display("footer.tpl");
?>