<?php
/*
 * 侧边栏小工具
 *
 * */
require_once '../init.php';
require_once  XABLOG_PATH.'/class/class_user.php';
require_once  XABLOG_PATH.'/class/class_post.php';
require_once  XABLOG_PATH.'/lib/function_base.php';
if(!chklogin()&&!islogin()){
	header('Location:index.php?action=login');
}
//bloger信息
function w_bloger(){
	$userdata=array();
	$user=new user();
	$userdata=$user->get_user();
	//	print_r($userdata);
	foreach ($userdata as $key=>$val){
		foreach ($val as $key=>$val){
			if($key=='user_name'){
				$name=$val;
			}elseif ($key=='user_face'){
				$face=$val;
			}elseif ($key=='user_email'){
				$email=$val;
			}
		}
	}
	//	print_r($name.$face.$des);
	$img=substr($face, 3);
	$str="<div class='w_side'>
		 <p style=\"font-size:20px;font-color:#CCC;\">&nbsp;博主</p>
		 <p><center><img src='".$img."' style='width:120px;height:120px;'/></center></p>
		 <p><center><a href=\"mailto:".$email."\">".$name."</a></center></p>
		 </div>";
	return $str;
}

function w_link(){
	$name="w_link";
	$str="<div class='w_side'>
		 <p>bloger:".$name."</p>
		 </div>";
	return $str;
}
function w_rss(){
	$name="w_link";
	$str="<div class=\"rss\">
             <ul class=\"rss_bor\">
	             <li class=\"rss_png\"><a href=\"#\">通过RSS订阅</a></li>
               </ul>
          </div>";
	return $str;
}
function w_sort(){
	$name="w_sort";
	$str="<div class='w_side'>
		 <p>bloger:".$name."</p>
		 </div>";
	return $str;
}

function w_tag(){
	$name="w_tag";
	$str="<div class='w_side'>
		 <p>bloger:".$name."</p>
		 </div>";
	return $str;
}

function w_npost(){
	$post=new post();
	$posts=$post->get_lastest_post();
	foreach ($posts as $item){
	//	print_r($item);
		$post_list=$post_list."<p class=\"post_new\"><a href=\"?post_id=".$item['post_id']."\" id=\"post_new\">".$item['post_title']."</p>";
	//	$post_list="<p>posts</p>";
	}
	$str="<div class='w_side'>
	<p style=\"font-size:20px;font-color:#CCC;\">&nbsp;最新文章</p>
		 ".$post_list."
	</div>";
//	echo $post_list;
	return $str;
}

function w_ncom(){
$name="w_ncom";
$str="<div class='w_side'>
<p>bloger:".$name."</p>
</div>";
	return $str;
}

function w_calendar(){
$name="w_calendar";
$str="<div class='w_side'>
<p>bloger:".$name."</p>
</div>";
	return $str;
}
//自定义组件
function w_diy($name,$content){
$str="<div class='w_side'>
<p>".$name."</p>
<p>".$content."</p>
</div>";
	return $str;
}
?>