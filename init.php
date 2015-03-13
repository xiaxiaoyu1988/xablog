<?php
/*
 * @初始化BLOG
 *
 * */
require_once 'option.php';
require_once 'lib/config.php';
require_once 'lib/function_base.php';

define('ROLE', islogin()?get_role():'vistor');
define('XABLOG_URL', get_blogurl());
define('FRONT_TPL_URL', XABLOG_URL.'view/');
define('FRONT_TPL_PATH', XABLOG_PATH.'/view/');

$tpl=tpl_init();
define('FRONT_TPL', $tpl);
$active_plugins = read_plugin();
if ($active_plugins && is_array($active_plugins)) {
	foreach($active_plugins as $plugin) {
		include_once('view/plugins/' . $plugin);
	}
}
?>