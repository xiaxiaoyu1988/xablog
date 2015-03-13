<?php
/*
 *日记页面，负责控制写日记页面，edit日记页面，
 *ps：addlog过程也在此，可以考虑ajax处理，注意日记添加成功后，当前页面日记内容的清除。如果不用ajax可以略过此过程,暂时不动
 *
 * */
require_once 'global.php';

$action=$_GET['action'];
$post_id=$_GET['post_id'];
$path=XABLOG_URL.'view/';
$url=XABLOG_URL;

if(!chklogin()&&!islogin()){
	header('Location:index.php?action=login');
}

$post=new post();
$obj=new sort();
$tag=new tag();

$postdata=array();
$tagdata=array();

//$smarty->assign('result',$result);
$smarty->assign('path',$path);
$smarty->assign('url',$url);
$userdata=get_userdata();
$user=explode('@', $userdata);
$smarty->assign('userdata',$user[0]);
$smarty->assign('userface',$user[1]);

$tagdata=$tag->get_tag();
$smarty->assign('tagdata',$tagdata);

if($action==''){
	$sort=array();
	$sort=$obj->get_sort();
	$smarty->assign('sort',$sort);
	$flag=8;
	$do=0;
}

if($action=='addlog'){
	$do=1;
	$sort=array();
	$sort=$obj->get_sort();
	$sort_id=empty($_POST['sort_name'])?0:$_POST['sort_name'];
	//echo "<script>alert(".$sort_id.");</script>";
	$post_title=$_POST['post_name'];
	$post_title=($post_title=='请输入文章标题')?'xablog自动生成的标题（请修改）':$post_title;
	$post_content=$_POST['content'];
	$user=explode('@', get_userdata());
	$post_author=$user[0];
	$tagstr=$_POST['tag_list'];
	//echo $post_title;
	$tag_list=@explode(',', $tagstr);
	//print_r($tag_list);
	$post_count='';
	$post_tag=$_POST['post_tag'];
	/*echo $post_content.$post_title.$sort_id.$post_date.$userid;
	 echo $author;*/
	if($post->add_post($sort_id, $post_title, $post_content, $post_author, $post_count, $post_tag)){
		$poststr=$post->get_post_id($post_title);
		$p_id=$poststr[0][0];
		//echo $p_id;
		foreach ($tag_list as $item){
			//echo $item;
			$tag->update_tag_byname($item, $p_id);
		}
		update_front_widgets();
		$flag=1;
		//echo $flag;
		$smarty->assign('flag',$flag);
		$smarty->assign('sort',$sort);
	}
}

if($action=='edit'){
	$do=2;
	$smarty->assign("post_id",$post_id);
	$postdata=$post->get_post_only($post_id);
	$smarty->assign("postdata",$postdata);
}

switch ($do){
	case 0:
		$smarty->assign('title','添加新日志');
		$smarty->assign('flag',$flag);
		$smarty->display('admin_index.tpl');
		$smarty->display('write.tpl');break;
	case 1:
		$smarty->display('admin_index.tpl');
		$smarty->display('write.tpl');break;
	case 2:
		$smarty->assign('title','更新日志');
		$smarty->display('admin_index.tpl');
		$smarty->display("edit.tpl");break;
}


$smarty->display("footer.tpl");
?>