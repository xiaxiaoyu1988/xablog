<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{$title}></title>
<link rel="stylesheet" type="text/css" href="<{$path}>css/admin_index.css" />
<link type="text/css" href="<{$path}>css/smoothness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<{$path}>js/admin.js"></script>
<script type="text/javascript" src="<{$path}>js/jquery-1.4.4.js"></script>
<script type="text/javascript" src="<{$path}>js/jquery-ui-1.8.10.custom.min.js"></script>
<script type="text/javascript" src="<{$path}>js/jquery.ui.sortable.js"></script>
<script type="text/javascript" src="<{$path}>js/plugin-interface.js"></script>
<{php}>@do_action('admin_head');<{/php}>
</head>
<script language="javascript">

</script>
<body>
<div class="main">
<div class="main_head"><img src="<{$path}>images/logo.png" class="main_img"
	height="40px" />
<h1><a href="/xablog" target="_blank">xiaoyu</a> <span>|</span> <a href="/xablog/admin"><em>XABLOG</em></a>
</h1>
<div class="main_info">
<p><a href="#"><{$userdata}></a> | <a href="index.php?action=logout">退出</a></p>
</div>
</div>
<div class="admin_index"><{php}>@do_action('admin_index');<{/php}></div>
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
