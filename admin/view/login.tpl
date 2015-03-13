<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-CN">
<head>
<title><{$title}></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' href='<{$path}>css/login.css' type='text/css' />
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
