<?php
define('SMARTY_PATH','/lib/');
require XABLOG_PATH.SMARTY_PATH.'Smarty.class.php';
$smarty = new Smarty;

$smarty->template_dir = XABLOG_PATH.'/admin/view/';
$smarty->compile_dir = XABLOG_PATH.'/admin/templates_c/';
$smarty->config_dir = XABLOG_PATH.'/admin/configs/';
$smarty->cache_dir = XABLOG_PATH.'/admin/cache/';
//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->cache=true;
$smarty->php_handling=SMARTY_PHP_ALLOW;
$smarty->allow_php_tag = true;
$smarty->left_delimiter = '<{';
$smarty->right_delimiter = '}>';
?>
