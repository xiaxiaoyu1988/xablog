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

$cache=new cache();
$w_list=array();
$diy_list=$cache->get_cache("cache/diy_list");
$smarty->assign('diy_list',$diy_list);
$smarty->assign('title','分类管理');
//$smarty->assign('result',$result);
$smarty->assign('path',$path);
$userdata=get_userdata();
$user=@explode('@', $userdata);
$smarty->assign('userdata',$user[0]);
$smarty->assign('userface',$user[1]);
$list=@explode(',', $cache->get_cache("cache/w_list"));
foreach ($list as $item){
	$w_list[]=@explode('/', $item);
}
$smarty->assign('w_list',$w_list);

if($action==''){

}

$smarty->display('admin_index.tpl');
$smarty->display('widget.tpl');
$smarty->display("footer.tpl");
?>