<?php
$conn=mysql_connect("localhost","root","");//建立数据库连接
mysql_select_db("xablog",$conn);//选择数据库
mysql_query("set names utf-8");//设置字符集
?>