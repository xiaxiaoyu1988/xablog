<?php /* Smarty version Smarty3rc4, created on 2011-06-01 06:36:42
         compiled from "C:\xampp\htdocs\xablog/view/templates/default/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118144de5ddfad705d2-37882760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f15a3a70e61e71535d7566044462296db42d300d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/view/templates/default/main.tpl',
      1 => 1306910201,
    ),
  ),
  'nocache_hash' => '118144de5ddfad705d2-37882760',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'C:\xampp\htdocs\xablog\lib\plugins\block.php.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
@do_action('index_head');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

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
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pagedata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<li><a href="?page=<?php echo $_smarty_tpl->tpl_vars['item']->value['page_title'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['page_title'];?>
</a></li>
	<?php }} ?>
	<li><a href="admin/index.php?action=login">登录</a></li>
</ul>
</div>
<!--#header-->
<div class="container">
<div class="c_head"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/c_head.jpg" /></div>
<div class="primary">
<!-- 
<div class="post">hello world!</div>
<div class="post">Tesing post</div>
 -->



