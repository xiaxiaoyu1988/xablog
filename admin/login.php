<?php
require_once 'global.php';
session_start();
$action=$_GET['action'];
if($action=='login'){
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$rem=$_POST['rem'];
	//$pwd=md5($_POST['pwd']);
	if($p=chkuserlogin($username, $pwd, $chkpng)==true){
		$_SESSION['temp']=md5($username);
		if($rem=='forever'){
			set_cookie($username);
		}
		else {
			des_cookie();
		}
		header('Location:./');
	}
	else{
		header('Location:./index.php?action=login');
	}
}
else {
	print "<center><div style='background=#EEE;height=60px;width=240px;border=1px solid #333;font:12px blue;text-algin:center;'>你想干嘛？<a href='index.php?action=login'>点我返回</a></div></center>";
	//header('Location:./index.php?action=login');
}
?>
