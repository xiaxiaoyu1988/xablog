<?php /* Smarty version Smarty3rc4, created on 2011-05-11 08:49:08
         compiled from "C:\xampp\htdocs\xablog/view/templates/default/main.php" */ ?>
<?php /*%%SmartyHeaderCode:267094dca4d8478f667-51768865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '512392a193861e1b222f05c60ca7dc176ecaed21' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/view/templates/default/main.php',
      1 => 1305103746,
    ),
  ),
  'nocache_hash' => '267094dca4d8478f667-51768865',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
css/reply.css" />
<link type="text/css" href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
css/smoothness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
js/jquery.qtip-1.0.0.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
js/jquery.ui.datepicker-zh-CN.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
js/jquery-ui-1.8.10.custom.min.js"></script>
<title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
</head>

<body>
<div class="page">
<div class="header">
<div class="home">
<h1 class="homelink"><a href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
">xtimer.org</a></h1>
<p class="description">xia xiao yu<?php echo $_smarty_tpl->getVariable('userid')->value;?>
</p>
</div>
<div class="skip"><a href="#">skip</a></div>
<!--暂时不知道作用-->
<ul class="menu">
	<li class="menu_li"><a href="#">home</a></li>
	<li><a href="#">download</a></li>
	<li><a href="xtimer.org">testing</a></li>
	<li><a href="admin/index.php?action=login">登录</a></li>
</ul>
</div>
<!--#header-->
<div class="container">
<div class="c_head"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/c_head.jpg" /></div>
<?php require_once 'class/class_plugin.php';
require_once 'lib/class_mysql.php';
require_once 'lib/function_base.php';

$db = new mysql_fun();
$sql = "select * from  xa_option where option_name = 'active_plugins'";
$query=$db->query($sql);
$active_plugin=$db->fetch_row($query);
$active_plugins = unserialize($active_plugin[2]);

if ($active_plugins && is_array($active_plugins)) {
	foreach($active_plugins as $plugin) {
		if(true === checkplugin($plugin)) {
			include_once('../view/plugins/' . $plugin);
		}
	}
}

@do_action('index');?>
<div class="primary">
<!-- 
<div class="post">hello world!</div>
<div class="post">Tesing post</div>
 -->



