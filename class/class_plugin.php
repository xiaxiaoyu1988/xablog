<?php
require_once '../lib/class_mysql.php';
require_once '../lib/function_base.php';
class xaplugin{
	private $db;
	private $plugin;

	function __construct($plugin = ''){
		//	$this->db = mysql_fun::getInstance();
		$this->plugin = $plugin;
	}

	function active_plugin($active_plugins){
		if(in_array($this->plugin, $active_plugins)){
			return true;
		}elseif (true === checkplugin($this->plugin)){
			$active_plugins[] = $this->plugin;
			$active_plugins = serialize($active_plugins);
			update_option('active_plugins', $active_plugins);
			return true;
		}else {
			return false;
		}
	}

	function inactive_plugin($active_plugins){
		if (in_array($this->plugin, $active_plugins))
		{
			$key = array_search($this->plugin, $active_plugins);
			unset($active_plugins[$key]);
		} else {
			return;
		}
		$active_plugins = serialize($active_plugins);
		update_option('active_plugins', $active_plugins);
	}

	function get_plugins(){
		global $xaplugins;
		if (isset($xaplugins))
		{
			return $xaplugins;
		}
		$xaplugins = array();
		$pluginfiles = array();
		$pluginpath = '../view/plugins';
		$plugindir = @dir($pluginpath);
		if($plugindir){
			while (($file = $plugindir->read()) !== false){
				if(preg_match('|^\.+$|', $file)){
					continue;
				}
				if (is_dir($pluginpath.'/'.$file)){
					$pluginssubdir = @dir($pluginpath.'/'.$file);
					if ($pluginssubdir)
					{
						while(($subfile = $pluginssubdir->read()) !== false)
						{
							if (preg_match('|^\.+$|', subfile))
							{
								continue;
							}
							if ($subfile == $file.'.php')
							{
								$pluginfiles[] = "$file/$subfile";
							}
						}
					}
				}
			}
		}
		if (!$plugindir || !$pluginfiles)
		{
			return $xaplugins;
		}
		sort($pluginfiles);
		foreach($pluginfiles as $pluginfile)
		{
			$plugindata = $this->get_plugindata("$pluginpath/$pluginfile");
			if (empty($plugindata['Name']))
			{
				continue;
			}
			$xaplugins[$pluginfile] = $plugindata;
		}
		return $xaplugins;
	}

	function get_plugindata($pluginfile){
		$plugindata = implode('', file($pluginfile));
		preg_match("/Plugin Name:(.*)/i", $plugindata, $plugin_name);
		preg_match("/Version:(.*)/i", $plugindata, $version);
		preg_match("/Plugin URL:(.*)/i", $plugindata, $plugin_url);
		preg_match("/Description:(.*)/i", $plugindata, $description);
		preg_match("/Author:(.*)/i", $plugindata, $author_name);
		preg_match("/Author Email:(.*)/i", $plugindata, $author_email);
		preg_match("/Author URL:(.*)/i", $plugindata, $author_url);

		$plugin_name = isset($plugin_name[1]) ? trim($plugin_name[1]) : '';
		$version = isset($version[1]) ? $version[1] : '';
		$description = isset($description[1]) ? $description[1] : '';
		//$plugin_url = isset($plugin_url[1]) ? trim($plugin_url[1]) : '';
		$plugin_url = "n";
		$author = isset($author_name[1]) ? trim($author_name[1]) : '';
		$author_email = isset($author_email[1]) ? trim($author_email[1]) : '';
		$author_url = isset($author_url[1]) ? trim($author_url[1]) : '';

		return array(
		'Name' => $plugin_name,
		'Version' => $version,
		'Description' => $description,
		'Url' => $plugin_url,
		'Author' => $author,
		'Email' => $author_email,
		'AuthorUrl' => $author_url,
		);
	}
}
?>