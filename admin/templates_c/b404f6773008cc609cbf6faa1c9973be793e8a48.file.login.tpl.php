<?php /* Smarty version Smarty3rc4, created on 2011-05-11 09:05:55
         compiled from "C:\xampp\htdocs\xablog/admin/view/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:229174dca5173d2a262-17287441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b404f6773008cc609cbf6faa1c9973be793e8a48' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/login.tpl',
      1 => 1299758921,
    ),
  ),
  'nocache_hash' => '229174dca5173d2a262-17287441',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-CN">
<head>
<title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' href='<?php echo $_smarty_tpl->getVariable('path')->value;?>
css/login.css' type='text/css' />
</head>
<body class="login" onload="javascript:loginform.username.focus();">
<p class="backtoblog"><a href="../" title="想回去看看？" class="acss">&larr;返回</a>
</p>
<div class="logintop">
<h1><a href="http://xtimer.org" title="由 Sablog 所驱动">everything</a></h1>
<form name="loginform" action="login.php?action=login" method="post">
<p><label>用户名<br />
<input type="text" name="username" class="inputcss" value="" size="20"
	tabindex="10" /></label></p>
<p><label>密码<br />
<input type="password" name="pwd" class="inputcss" value="" size="20"
	tabindex="20" /></label></p>
<p class="forgetmenot"><label><input name="rem" type="checkbox"
	class="chkcss" value="forever" tabindex="90" size="5" />记住我的登录信息</label></p>
<p class=version><span>版本V1.0</span></p>
<p class="submit"><input type="submit" name="submit" class="buttoncss"
	value="登录" tabindex="100" /></p>
</form>
</div>

</body>
</html>
