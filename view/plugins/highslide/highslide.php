<?php
/*
Plugin Name: highslide
Version: 1.7
Plugin URL:
Description: 给博客中的图片添加highslide效果。
Author: KLLER
Author Email: kller@foxmail.com
Author URL: http://kller.cn
*/
function highslide()
{
	if(isset($_GET['plugin']) && $_GET['plugin'] == 'kl_album') return;
	global $log_content, $logs;
	$kl_whether_show = false;
	$search_pattern = "%<a([^>]*?)href=\"[^\"]*?[jpg|gif|png|jpeg|bmp]\"([^>]*?)>.*?</a>%s";
	if(!is_null($log_content))
	{
		preg_match_all($search_pattern, $log_content, $dataArr, PREG_PATTERN_ORDER);
		if(!empty($dataArr[0])) $kl_whether_show = true;
	}
	if (!is_null($logs) && is_array($logs))
	{
		foreach($logs as $log)
		{
			preg_match_all($search_pattern, $log['log_description'], $dataArr, PREG_PATTERN_ORDER);
			if(!empty($dataArr[0]))
			{
				$kl_whether_show = true;
				break;
			}
		}
	}
	if($kl_whether_show === false) return;
	echo '<link href="view/plugins/highslide/highslide/highslide.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="view/plugins/highslide/highslide/highslide.js"></script>
<script type="text/javascript" src="lib/jquery-1.4.4.js"></script>
<script type="text/javascript">
    hs.graphicsDir = "view/plugins/highslide/highslide/graphics/";
    hs.outlineType = "rounded-white";
    jQuery(function($){$("a[href$=jpg],a[href$=gif],a[href$=png],a[href$=jpeg],a[href$=bmp]").addClass("highslide").each(function(){this.onclick=function(){return hs.expand(this)}});})
</script>';
}

add_action('index_head', 'highslide');