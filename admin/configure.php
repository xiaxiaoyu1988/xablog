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
$smarty->assign('title','博客设置');
//$smarty->assign('result',$result);
$smarty->assign('path',$path);

$userdata=get_userdata();
$user=explode('@', $userdata);
$smarty->assign('userdata',$user[0]);
$smarty->assign('userface',$user[1]);
if($action==''){
	$smarty->assign('tpl',FRONT_TPL);
	$tpls=tpl_list();
	$tpln=count($tpls);
	$smarty->assign('tpls',$tpls);
	$smarty->assign('tpln',$tpln);
}

if($action=='usetpl'){
	$tpl_name=$_GET['tpl'];
	update_option('tpl', $tpl_name);

	$smarty->assign('tpl',tpl_init());
	$tpls=tpl_list();
	$tpln=count($tpls);
	$smarty->assign('tpls',$tpls);
	$smarty->assign('tpln',$tpln);
}
if($action=='dellink'){
	$link_id=$_GET['link_id'];
	if($link->del_link($link_id)){
		$linkdata=$link->get_link();
		$flag=0;
	}
}

$smarty->assign('flag',$flag);
$smarty->assign('commentdata',$commentdata);
$smarty->display('admin_index.tpl');
$smarty->display('configure.tpl');
$smarty->display("footer.tpl");
?>