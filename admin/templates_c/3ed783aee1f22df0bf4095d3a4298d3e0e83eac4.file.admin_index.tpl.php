<?php /* Smarty version Smarty3rc4, created on 2011-06-01 07:27:29
         compiled from "C:\xampp\htdocs\xablog/admin/view/admin_index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143254de5e9e16d3787-88296315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ed783aee1f22df0bf4095d3a4298d3e0e83eac4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/admin_index.tpl',
      1 => 1306913247,
    ),
  ),
  'nocache_hash' => '143254de5e9e16d3787-88296315',
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
<title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
css/admin_index.css" />
<link type="text/css" href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
css/smoothness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
js/admin.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
js/jquery-1.4.4.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
js/jquery-ui-1.8.10.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
js/jquery.ui.sortable.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
js/plugin-interface.js"></script>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
@do_action('admin_head');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</head>
<script language="javascript">

</script>
<body>
<div class="main">
<div class="main_head"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/logo.png" class="main_img"
	height="40px" />
<h1><a href="/xablog" target="_blank">xiaoyu</a> <span>|</span> <a href="/xablog/admin"><em>XABLOG</em></a>
</h1>
<div class="main_info">
<p><a href="#"><?php echo $_smarty_tpl->getVariable('userdata')->value;?>
</a> | <a href="index.php?action=logout">退出</a></p>
</div>
</div>
<div class="admin_index"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
@do_action('admin_index');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div>
<div class="main_menu">
<ul class="menu_admin">
	<li>
	<div class="menu_top" onclick="menu_sub_hide('menu_sub_post')"><strong id="sub1">文章管理</strong></div>
	<div class="menu_sub" id="menu_sub_post">
	<ul>
		<li class="menu_sub_li"><a href="write.php">写文章</a></li>
		<li class="menu_sub_li"><a href="post.php">文章</a></li>
		<li class="menu_sub_li"><a href="tag.php">标签</a></li>
		<li class="menu_sub_li"><a href="sort.php">分类</a></li>
		<li class="menu_sub_li"><a href="comment.php">评论</a></li>
		<!-- <li class="menu_sub_li"><a href="#">草稿箱</a></li> -->
	</ul>
	</div>
	</li>
	<li>
	<div class="menu_top" onclick="menu_sub_hide('menu_sub_option')"><strong
		id="sub2">博客管理</strong></div>
	<div class="menu_sub" id="menu_sub_option">
	<ul>
		<li class="menu_sub_li"><a href="configure.php">博客设置</a></li>
		<li class="menu_sub_li"><a href="page.php">页面</a></li>
		<li class="menu_sub_li"><a href="link.php">链接</a></li>
		<li class="menu_sub_li"><a href="user.php">作者</a></li>
		<li class="menu_sub_li"><a href="widget.php">小工具</a></li>
	</ul>
	</div>
	</li>
	<li>
	<div class="menu_top" onclick="menu_sub_hide('menu_sub3')"><strong
		id="sub3">工具管理</strong></div>
	<div class="menu_sub" id="menu_sub3">
	<ul>
		<li class="menu_sub_li"><a href="plugin.php">插件</a></li>
		<li class="menu_sub_li"><a href="#">temp</a></li>
	</ul>
	</div>
	</li>
</ul>
</div>
<!--  <div>{$write}</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
<!--footer
</body>
</html>-->
