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

$obj=new sort();
$smarty->assign('title','分类管理');
//$smarty->assign('result',$result);
$smarty->assign('path',$path);
$userdata=get_userdata();
$user=explode('@', $userdata);
$smarty->assign('userdata',$user[0]);
$smarty->assign('userface',$user[1]);
if($action==''){
	$sort=array();
	$flag=4;
	$sort=$obj->get_sort();
}
if($action=='addsort'){
	$sort=array();
	$sort_name=$_POST['sort_name'];
	$sort_des=$_POST['sort_des'];

	if ($obj->get_sort_byname($sort_name)||empty($sort_name)){
		$flag=2;
	}else{
		$obj->add_sort($sort_name, $sort_des);
		$flag=1;
	}
	$sort=$obj->get_sort();
}
if($action=='delsort'){
	$sort=array();
	$sort_id=$_GET['sort_id'];
	if($obj->del_sort($sort_id)){
		$sort=$obj->get_sort();
		$flag=0;
	}
}
$smarty->assign('flag',$flag);
$smarty->assign('sort',$sort);
$smarty->display('admin_index.tpl');
$smarty->display('sort.tpl');
$smarty->display("footer.tpl");
?>