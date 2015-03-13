<?php
/*
 *
 *
 * */
require_once 'class_mysql.php';
session_start();
function islogin(){
	if(isset($_COOKIE['XABLOG_AUTO_COOKIE'])){
		//print "设置cookie";
		if (empty($_COOKIE['XABLOG_AUTO_COOKIE'])){
			//print "cookie 无值";
			return false;
		}
		else {
			//print "cookie 有值";
			//print $_COOKIE['XABLOG_AUTO_COOKIE'];
			//print $userid;
			return true;
		}
	}
	else {
		//print "未设置cookie";
		return false;
	}

}

function chklogin(){
	if(isset($_SESSION['temp'])){
		if(empty($_SESSION['temp']))
		{
			return false;
		}else{
			return true;
		}
			
	}else {
		return false;
	}
}

function chkuserlogin($username,$pwd,$chkpng){
	$chk=new mysql_fun();
	$sql="select * from xa_user where user_name='".$username."' and user_pwd='".$pwd."'";
	$result=$chk->query($sql);
	$info=$chk->fetch_array($result);
	if(!$info){
		return false;
	}else {
		return true;
	}
	$chk->close();
}

function set_cookie($username){
	$value=md5($username);
	$outtime=time()+60*60*24*7;
	setcookie(XABLOG_AUTO_COOKIE,$value,$outtime,'/');
	//print $_COOKIE['XABLOG_AUTO_COOKIE'];
}

function des_cookie(){
	setcookie(XABLOG_AUTO_COOKIE,"",time()-60*60*24*7*2,'/');
	//setcookie(XABLOG_AUTO_COOKIE,NULL);
}

function get_userdata(){
	$getdata=new mysql_fun();
	$username=isset($_COOKIE['XABLOG_AUTO_COOKIE'])?$_COOKIE['XABLOG_AUTO_COOKIE']:$_SESSION['temp'];
	$sql="select * from xa_user";
	$result=$getdata->query($sql);
	while($info=$getdata->fetch_array($result)){
		if(md5($info['user_name']==$username)){
			return $info['user_name']."@".$info['user_face'];
		}
	}
}

function get_role(){
	$getdata=new mysql_fun();
	$username=isset($_COOKIE['XABLOG_AUTO_COOKIE'])?$_COOKIE['XABLOG_AUTO_COOKIE']:$_SESSION['temp'];
	$sql="select * from xa_user";
	$result=$getdata->query($sql);
	while($info=$getdata->fetch_array($result)){
		if(md5($info['user_name']==$username)){
			return $info['user_role'];
		}
	}
}

function get_blogurl(){
	$file_url=$_SERVER['SCRIPT_NAME'];
	if(preg_match("/^.*\//", $file_url, $matches)){
		return 'http://'.$_SERVER['HTTP_HOST'].$matches[0];
	}
}

function upfile($filename,$type,$filesize,$tmpname){
	//echo UPFILEPATH;
	//$filesize=100;
	//echo $filename.'+'.$filetype.'+'.$filesize.'+'.$tmpname;
	$filetype=strstr($filename, '.');
	$fname=md5($filename).gmdate('YmdHi');
	$filepath=UPFILEPATH.gmdate('Ymd').'/';
	//$name =iconv("utf-8","gb2312",$fname);

	if(!is_dir($filepath)){
		@mkdir($filepath,0777);
	}else if($filesize>MAX_FILESIZE){
		echo "<script>alert('附件大小超出限制(5M)');</script>";
		return 0;
	}else{
		move_uploaded_file($tmpname, $filepath.$fname.$filetype);
		//echo $filepath.$fname.$filetype;
		return $filepath.$fname.$filetype;
	}
}

function update_front_widgets(){
	$list=array();
	$w=array();
	$cache=new cache();
	$list=@explode(',', $cache->get_cache('cache/w_list'));
	foreach ($list as $item){
		$w[]=@explode('/', $item);
	}
	//print_r($w);
	$str='';
	$diy=new mysql_fun();
	foreach ($w as $val){
		switch ($val[0]){
			case 'w_link'  :$str=$str.w_link();break;
			case 'bloger'  :$str=$str.w_bloger();break;
			case 'w_sort'  :$str=$str.w_sort();break;
			case 'w_npost' :$str=$str.w_npost();break;
			case 'w_ncom'  :$str=$str.w_ncom();break;
			case 'w_tag'   :$str=$str.w_tag();break;
			case 'rss'     :$str=$str.w_rss();break;
			case 'calendar':$str=$str.w_calendar();break;
		}
		$diy->__construct();
		$sql="select * from xa_option where option_name='".$val[0]."'";
		$result=$diy->query($sql);
		while($info=$diy->fetch_array($result)){
			$str=$str.$info['option_value'];				
		}
	}
	$cache->update_cache($str, 'w');
}

function update_option($name,$value){
	$sql="update xa_option set option_value = '".$value."' where option_name = '".$name."'";
	$up = new mysql_fun();
	$up->query($sql);

}

function add_option($name,$value){
	$sql="insert into xa_option values('','".$name."','".$value."')";
	$up = new mysql_fun();
	$up->query($sql);

}
function del_option($name){
	$sql="delete from xa_option where option_name='".$name."'";
	$up = new mysql_fun();
	$up->query($sql);
}

/**
 * 检查插件
 *
 */
function checkplugin($plugin) {
	if (is_string($plugin) && preg_match("/^[\w\-\/]+\.php$/", $plugin) && file_exists('../view/plugins/' . $plugin)) {
		return true;
	} else {
		return false;
	}
}

function read_plugin(){
	$db = new mysql_fun();
	$sql = "select * from  xa_option where option_name = 'active_plugins'";
	$query=$db->query($sql);
	$active_plugin=$db->fetch_array($query);
	$active_plugins = unserialize($active_plugin[2]);
	return $active_plugins;
}

function add_action($hook,$func){
	global $HOOKS;
	if(!@in_array($func, $HOOKS[$hook])){
		$HOOKS[$hook][]=$func;
	}
	return true;
}

function do_action($hook){
	global $HOOKS;
	$args = array_slice(func_get_args(), 1);
	if(isset($HOOKS[$hook])){
		foreach ($HOOKS[$hook] as $function){
			$string = call_user_func_array($function, $args);
		}
	}
}

function tpl_list(){
	$tpl_path="../view/templates";
	$handle = @opendir($tpl_path) OR die('template path error!');
	$tpls = array();
	while ($file = @readdir($handle))
	{
		if(file_exists($tpl_path.'/'.$file.'/author.php'))
		{
			$tplData = implode('', @file($tpl_path.'/'.$file.'/author.php'));
			preg_match("/Template Name:([^\r\n]+)/i", $tplData, $name);
			preg_match("/Sidebar Amount:([^\r\n]+)/i", $tplData, $sidebar);
			$tplInfo['tplname'] = !empty($name[1]) ? trim($name[1]) : $file;
			$tplInfo['num'] = !empty($sidebar[1]) ? intval($sidebar[1]) : 1;
			$tplInfo['tplfile'] = $file;
			$tpls[] = $tplInfo;
		}
	}
	closedir($handle);
	return $tpls;
}

function tpl_init(){
	$sql="select * from xa_option where option_name='tpl'";
	$tplc=new mysql_fun();
	$result=$tplc->query($sql);
	while($info=$tplc->fetch_array($result)){
		return $info['option_value'];
			
	}
}

function tpl_use(){

}
?>