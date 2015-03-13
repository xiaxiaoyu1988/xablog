<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<{$path}>css/main.css" />
<link rel="stylesheet" type="text/css" href="<{$path}>css/reply.css" />
<link type="text/css" href="<{$path}>css/smoothness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="<{$path}>js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<{$path}>js/jquery.qtip-1.0.0.min.js"></script>
<script type="text/javascript" src="<{$path}>js/jquery.ui.datepicker-zh-CN.js"></script>
<script type="text/javascript" src="<{$path}>js/jquery-ui-1.8.10.custom.min.js"></script>
<title><{$title}></title>
</head>
<{php}>@do_action('index_head');<{/php}>
<body>
<div class="page">
<div class="header">
<div class="home">
<h1 class="homelink"><a href="<{$url}>">xtimer.org</a></h1>
<p class="description">xia xiao yu<{$userid}></p>
</div>
<div class="skip"><a href="#">skip</a></div>
<!--暂时不知道作用-->
<ul class="menu">
	<li class="menu_li"><a href="#">home</a></li>
	<{foreach key=key item=item from=$pagedata}>
	<li><a href="?page=<{$item['page_title']}>"><{$item['page_title']}></a></li>
	<{/foreach}>
	<li><a href="admin/index.php?action=login">登录wp</a></li>
</ul>
</div>
<!--#header-->
<div class="container">
<div class="c_head"><img src="<{$path}>images/c_head.jpg" /></div>
<div class="primary">
<!-- 
<div class="post">hello world!</div>
<div class="post">Tesing post</div>
 -->



