<?php
define('SMARTY_PATH','/lib/');
require XABLOG_PATH.SMARTY_PATH.'Smarty.class.php';
$smarty = new Smarty;

$smarty->template_dir = FRONT_TPL_PATH.'templates/'.FRONT_TPL.'/';
$smarty->compile_dir = FRONT_TPL_PATH.'templates_c/';
$smarty->config_dir = FRONT_TPL_PATH.'configs/';
$smarty->cache_dir = FRONT_TPL_PATH.'cache/';
//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->php_handling=SMARTY_PHP_ALLOW;
$smarty->allow_php_tag = true;
$smarty->left_delimiter = '<{';
$smarty->right_delimiter = '}>';
?>
