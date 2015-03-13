<?php
/*
 * 侧边栏小工具
 *
 * */
require_once '../init.php';
require_once  XABLOG_PATH.'/class/class_user.php';
require_once  XABLOG_PATH.'/class/class_post.php';
require_once  XABLOG_PATH.'/lib/function_base.php';

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
			}elseif($key=='user_des'){
				$des=$val;
			}
		}
	}
	//	print_r($name.$face.$des);
	$img=substr($face, 3);
	$str="<script>
		$(\"#bloger_img\").qtip({
  				 content: 'Dark themes are all the rage!',
 		  style: { 
   			   name: 'dark' // Inherit from preset style
 		  }
			});
		</script>
		<div class='w_side'>
		 <p style=\"font-size:18px;\" id=\"w_title\">&nbsp;博主</p>
		 <p><center><img id=\"bloger_img\" src='".$img."' title='".$des."' width=\"120px\" height=\"130px\"/></center></p>
		 <p><center><a href=\"mailto:".$email."\">".$name."</a></center></p>
		 </div>";
	$user->__destruct();
	return $str;
}

function w_link(){
	$link=new link();
	$linkdata=$link->get_link();
	foreach ($linkdata as $item){
		$link_list = $link_list."<p id=\"sort\"><a href=\"".$item['link_url']."\"  title=".$item['link_des'].">".$item['link_name']."</a></p>";
	}
	$str="<div class='w_side'>
		 <p style=\"font-size:18px;\" id=\"w_title\">&nbsp;友链</p>".$link_list."
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
	$sort=new sort();
	$sorts=$sort->get_sort();
	foreach ($sorts as $item){
		$sort_list=$sort_list."<p id=\"sort\"><a href=\"?sort_id=".$item['sort_id']."\"  title=".$item['sort_name'].">".$item['sort_name']."</a></p>";
	}
	$str="<div class='w_side'>
	<p style=\"font-size:18px;\" id=\"w_title\">&nbsp;分类</p>
		 ".$sort_list."
	</div>";
	//	echo $post_list;
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
		$post_list=$post_list."<p class=\"post_new\"><a href=\"?post_id=".$item['post_id']."\" id=\"post_new\" title=".$item['post_title'].">".$item['post_title']."</a></p>";
		//	$post_list="<p>posts</p>";
	}
	$str="<div class='w_side'>
	<p style=\"font-size:18px;\" id=\"w_title\">&nbsp;最新文章</p>
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