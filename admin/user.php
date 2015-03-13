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

$user=new user();
$user_data=array();

$smarty->assign('title','作者管理');
$smarty->assign("url",XABLOG_URL);
$smarty->assign('path',$path);
$smarty->display('admin_index.tpl');
$userdata=get_userdata(1);
$users=explode('@', $userdata);
$smarty->assign('userdata',$users[0]);
$smarty->assign('userface',$users[1]);
if($action==''){
	$user_data=$user->get_user();
}

if($action=='update_user'){
	$flag=4;
	$user_email=$_POST['email'];
	//$admin_pic=$_POST['admin_pic'];
	$user_des=$_POST['admin_des'];
	//echo $email.$admin_des.$admin_pic;
	//echo "<script>alert('".$_FILES['admin_pic']['name'].$user_email.$_FILES['admin_pic']['type'].$_FILES['admin_pic']['size'].$_FILES['admin_pic']['tmp_name']."');</script>";
	if($_FILES['admin_pic']['size']>0){
		$user_face=upfile($_FILES['admin_pic']['name'],$_FILES['admin_pic']['type'],$_FILES['admin_pic']['size'],$_FILES['admin_pic']['tmp_name']);
	}else{
		$user_face=$_POST['user_face'];
		//echo $user_face."hello";
	}
	//echo "<script>alert('".$_FILES['admin_pic']['name'].$user_face.$_FILES['admin_pic']['type'].$_FILES['admin_pic']['size'].$_FILES['admin_pic']['tmp_name']."');</script>";
	//echo $user_email.$user_des.$user_face;
	if($user->update_user($user_email, $user_des, $user_face)){
		update_front_widgets();
		$flag=1;
	}else{
		$flag=2;
	}
	$smarty->assign('flag',$flag);
	//echo XABLOG_URL.$user_face;
	$user->__construct();
	$user_data=$user->get_user();
}

$smarty->assign('user_data',$user_data);
$smarty->display('user.tpl');
$smarty->display("footer.tpl");
?>