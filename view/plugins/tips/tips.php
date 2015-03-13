<?php
/*
Plugin Name: tips
Version: 1.0
Plugin URL:
Description: 这是世界上第一个xalog插件，它会在你的管理页面送上一句温馨的小提示。
Author: dawei
Author Email: emloog@gmail.com
Author URL: http://www.emlog.net/blog/
*/
$array_tips = array(
'你可以在日志中上传多个附件',
'xalog支持灵活的标签(tag)分类功能',
'在撰写日志的时候你可以使用Tab键方便的缩进内容',
'你可以使用widgets功能对博客侧边栏组件排序并自定义侧边栏的组件',
'你可以在日志中插入flash格式的多媒体文件',
'不一样的心情，日志表情图标为您传达',
'你可以把图片附件嵌入到内容中，让你的日志图文并茂',
'xablog支持自建页面，并且可以上传照片，为自己做一个图文并茂的自我介绍页吧',
'新建一个允许发表评论的页面，你会发现其实它还是一个简单的留言板',
'后台左侧菜单可以折叠哦、而且可以记住折叠状态',
'检查你的博客目录下是否存在安装文件：install.php，有的话请删除它',
'今天你备份数据了吗？',
'今天天气还不错哦 :)',
'节约能源，保护环境',
'如果你拥有爱，请在失去之前好好珍惜',
'生命在于运动，别总对着电脑，出去走走吧'
);
function tips()
{
	global $array_tips;
	$i = mt_rand(0, count($array_tips) - 1);
	$tip = $array_tips[$i];	
	echo "<div id=\"tip\"><img src=\"../view/plugins/tips/icon_tips.gif\">:) $tip</div>";
}
add_action('admin_index', 'tips');
function tips_css()
{
	echo "
	<style type='text/css'>
	#tip{
		/*background:url(../view/plugins/tips/icon_tips.gif) no-repeat left 3px;*/
		padding:3px 18px;
		margin:5px 0px;
		margin-left:150px;
		font-size:12px;
		color:#999999;
	}
	</style>";
}
add_action('admin_head', 'tips_css');
?>