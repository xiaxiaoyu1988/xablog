function do_action($hook){
	global $HOOKS;
	//	print_r($HOOKS);
	$args = array_slice(func_get_args(), 1);
	//	print_r($args);
	if(isset($HOOKS[$hook])){
		foreach ($HOOKS[$hook] as $function){
			$string = call_user_func_array($function, $args);
		}
	}
	echo "jjjj";
}