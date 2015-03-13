<?php
/*
 *
 *
 * */
class cache{

	public function admin_cache($str,$fname){
		$s=serialize($str);
		$fp=fopen("cache/".$fname, "w");
		if(fwrite($fp, $s)){
			return true;
		}else {
			return false;
		}
		fclose($fp);
	}
	public function update_cache($str,$fname){
		$s=serialize($str);
		$fp=fopen("../view/cache/".$fname, "w");
		if(fwrite($fp, $s)){
			return true;
		}else {
			return false;
		}
		fclose($fp);
	}

	public	function get_cache($fname){
		$s=implode("", @file($fname));
		$str=unserialize($s);
		return $str;
	}
}

?>