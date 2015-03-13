<?php
require_once 'lib/function_base.php';
print "cookie<br>";
print $_COOKIE['XABLOG_AUTO_COOKIE'];
if($test=islogin()){
	print "已经登录".$test;
}
else {
	print "未登录".$test;
}
?>