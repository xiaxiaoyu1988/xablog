<?php
/*
 *
 *
 * */
require_once 'global.php';
$action=$_GET['action'];
$path=XABLOG_URL.'view/';

$php_ver=PHP_VERSION;
$mysq_ver=@mysql_get_client_info();
$server_info=$_SERVER['SERVER_SOFTWARE'];
$safe_mode_state=ini_get('safe_mode')?'开启':'关闭';
$uploadfile_maxsize = ini_get('upload_max_filesize');


if($action=='login'){
	if (islogin()||chklogin()){
		header('Location:./');
	}
	else {
		$smarty->assign('title','登录');
		$smarty->assign('path',$path);
		$smarty->display("login.tpl");
		exit;
	}
}

if($action=="logout"){
	des_cookie();
	session_destroy();
	print "退出成功";
	exit;
}

if($action==''){
	if(chklogin()||islogin()){
		$userdata=get_userdata();
		$user=explode('@', $userdata);
		$smarty->assign('title','管理首页');
		$smarty->assign('path',$path);
		$smarty->assign('userdata',$user[0]);
		$smarty->assign('userface',$user[1]);
		$smarty->assign('php_ver',$php_ver);
		$smarty->assign('mysq_ver',$mysq_ver);
		$smarty->assign('server_info',$server_info);
		$smarty->assign('safe_mode_state',$safe_mode_state);
		$smarty->assign('uploadfile_maxsize',$uploadfile_maxsize);
		$smarty->display('admin_index.tpl');
		$smarty->display('main.tpl');
		$smarty->display("footer.tpl");
	}else{
		header('Location:index.php?action=login');
	}
}
elseif ($action=='phpinfo') {
	@phpinfo();
}
else {
	print "<center><div style='background=#EEE;height=60px;width=240px;border=1px solid #333;font:12px blue;text-algin:center;'>你又想干嘛？<a href='index.php?action=login'>点我返回</a></div></center>";

}

?>