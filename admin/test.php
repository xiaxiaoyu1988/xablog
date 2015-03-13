<?php
require_once 'global.php';

$postdata=array();

$sort=new sort();
$postlist=new post();
$postdata=$postlist->get_post_list_front();

//print_r($postdata);
$sortname=$sort->get_sort_name(45);
$sort_name="默认";
$sort_des="默认";
if($sort->add_sort($sort_name, $sort_des)){
	echo "success";
}


?>