<?php
require_once 'init.php';
include_once 'lib/front_config.php';
$path=FRONT_TPL_URL.'templates/'.FRONT_TPL.'/';
$post_id=$_GET['post_id'];
$sort_id=$_GET['sort_id'];
$page_tilte=$_GET['page'];
$action=$_POST['action'];
/*获取日志列表*/
require_once 'class/class_post.php';
require_once 'class/class_sort.php';
require_once 'class/class_cache.php';
require_once 'class/class_tag.php';
require_once 'class/class_comment.php';
require_once 'class/class_page.php';
$postdata=array();
$postonly=array();
$tagdata=array();
$post=new post();
$cache=new cache();
$tag=new tag();
$page=new page();
/*获取组件，页面列表*/

$widget=$cache->get_cache('view/cache/w');
$smarty->assign('widget',$widget);
$smarty->assign('userid',$userid);
$smarty->assign('meta',$meta);
$smarty->assign('path',$path);
$smarty->assign('url',XABLOG_URL);
$smarty->assign('title','主页');

$pagedata=$page->get_page();
$smarty->assign('pagedata',$pagedata);
$smarty->display("main.tpl");

//echo 'p'.empty($post_id);
//echo 's'.empty($sort_id);
//echo $action."+++++".empty($action);

//发表评论
if($action=='addcom'){
	$comment_poster=$_POST['name'];
	$comment_email=$_POST['email'];
	$comment_url=$_POST['url'];
	$comment_content=$_POST['com'];
	$post_id=$_POST['post_id'];
	//$comment_poster
	//$comment_content
	//$comment_replys
	//$comment_hide
	//$comment_email
	//$comment_ip
	//$comment_url
	//$comment_date
	//echo $name.$email.$url.$com.'+++++++++++++++++++++++++++++';
	//echo $action."-------";
	$comment=new comment();
	$comment->add_comment($post_id, $comment_poster, $comment_email, $comment_url, $comment_content);

}
//显示分类下的日志
if(empty($action)&&empty($post_id)&&($sort_id !='')){
	$postdata=$post->get_post_con($sort_id, '', 1);
	//	print_r($postdata);
	//	echo $sort_id;
	//	echo "heool";
	if(empty($postdata)){
		$postdata=array('0'=>Array ( 'post_title' => '啥也米有 '));
	}
	$smarty->assign('postdata',$postdata);
	$smarty->display("post_list.tpl");

}
//显示单篇日志 
if(empty($action)&&empty($sort_id)&&!empty($post_id)){
	$comment=new comment();
	$postonly=$post->get_post_only($post_id);
	$post_title=$postonly[0]['post_title'];
	$nb=$post->get_nbpost($postonly[0]['post_date']);
	$comdata=$comment->get_comment_byid($post_id);
	$coms=$comment->get_comments($post_id);
	$smarty->assign('nb',$nb);
	$smarty->assign('coms',$coms);
	$smarty->assign('postonly',$postonly);
	$smarty->assign('comdata',$comdata);
	$smarty->assign('title',$post_title);
	//echo "<script>alert(".$postonly[0]['post_count'].");</script>";
	$smarty->display("post.tpl");

}
//显示页面
if(empty($action)&&empty($sort_id)&&empty($post_id)&&!empty($page_tilte)){
	$pageonly=$page->get_page_bytitle($page_tilte);
	$smarty->assign('pageonly',$pageonly);
	$smarty->display("page.tpl");
}
//显示日志列表
if(empty($action)&&empty($sort_id)&&empty($post_id)&&empty($page_tilte)&&$sort_id ==''){
	$postdata=$post->get_post_list_front();
	$smarty->assign('postdata',$postdata);
	$smarty->display("post_list.tpl");
	
}



$smarty->display("siderbar.tpl");
$smarty->display("footer.tpl");
?>
