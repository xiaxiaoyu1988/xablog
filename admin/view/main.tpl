<script>
	$(document).ready(function(){
		$(".admin_input").mouseover(function(){
			$(this).height(80);
			$(this).focus();
			});
		$(".admin_input").mouseout(function(){
			$(this).height(40);
			});
		$("#save_t").click(function(){
			var des=$(".admin_input").val();
			$.ajax({
				   type: "POST",
				   url: "model.php",
				   data: {action:'update_user',user_des:des},
				   success: function(msg){
					   $("#show").html("<span class=\"sort_state\" id=\"state\"><img src=\"<{$path}>images/yes.png\" />更新成功</span> ");
				    	setTimeout('$("#show").hide()',3700);
				   }
				});

			});
		});
</script>
<div class="main_content">
	<div class="admin">	
		<div class="admin_head">
		<h3>博主信息</h3>
		<div class="admin_img">
			<img src="<{$userface}>" width="120px" height="130px"/>
		</div>
		<div class="admin_t">
			<input type="text" class="admin_input" />
			<input type="button" id="save_t" class="buttoncss" value="写好了"/>
			<div id="show"></div>
		</div>
		<div class="clear"></div>
		</div>
		<div class="admin_info">
			<div class="admin_tag ">
			<h3>常用选项</h3>
			<a href="write.php">
			<div class="ui-state-default ui-corner-all li_w admin_tag_p" title="添加新文章">
			<span class="ui-icon ui-icon-document"></span>
			</div></a>
		    <a href="post.php"><div class="ui-state-default ui-corner-all li_w admin_tag_p" title="文章管理">
		    <span class="ui-icon ui-icon-folder-open"></span>
		    </div></a>
			<a href="sort.php"><div class="ui-state-default ui-corner-all li_w admin_tag_p" title="分类管理">
		    <span class="ui-icon ui-icon-folder-open"></span>
		    </div></a>
		    <a href="#"><div class="ui-state-default ui-corner-all li_w admin_tag_p" title="博客设置">
		    <span class="ui-icon ui-icon-folder-open"></span>
		    </div></a>
		    <a href="#"><div class="ui-state-default ui-corner-all li_w admin_tag_p" title="小工具">
		    <span class="ui-icon ui-icon-folder-open"></span>
		    </div></a>
			</div>
		</div>
	</div>
	<div class="server_info" >
	<h4>服务器信息</h4>
		<div>
			<ul>
				<li>PHP版本：<{$php_ver}></li>
				<li>MYSQL版本：<{$mysq_ver}></li>
				<li>服务器环境：<{$server_info}></li>
				<li>安全模式：<{$safe_mode_state}></li>
				<li>服务器允许上传最大文件：<{$uploadfile_maxsize}></li>
				<li><a href="index.php?action=phpinfo">更多信息&raquo;</a></li>
			</ul>
		</div>
	</div>
	<div class="blog_info">bloginfo</div>
</div>