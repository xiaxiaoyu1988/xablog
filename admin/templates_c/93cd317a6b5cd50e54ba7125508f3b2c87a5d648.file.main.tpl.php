<?php /* Smarty version Smarty3rc4, created on 2011-05-11 09:05:15
         compiled from "C:\xampp\htdocs\xablog/admin/view/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:298664dca514bea1bf3-09596477%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93cd317a6b5cd50e54ba7125508f3b2c87a5d648' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/main.tpl',
      1 => 1302855340,
    ),
  ),
  'nocache_hash' => '298664dca514bea1bf3-09596477',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
					   $("#show").html("<span class=\"sort_state\" id=\"state\"><img src=\"<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png\" />更新成功</span> ");
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
			<img src="<?php echo $_smarty_tpl->getVariable('userface')->value;?>
" width="120px" height="130px"/>
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
				<li>PHP版本：<?php echo $_smarty_tpl->getVariable('php_ver')->value;?>
</li>
				<li>MYSQL版本：<?php echo $_smarty_tpl->getVariable('mysq_ver')->value;?>
</li>
				<li>服务器环境：<?php echo $_smarty_tpl->getVariable('server_info')->value;?>
</li>
				<li>安全模式：<?php echo $_smarty_tpl->getVariable('safe_mode_state')->value;?>
</li>
				<li>服务器允许上传最大文件：<?php echo $_smarty_tpl->getVariable('uploadfile_maxsize')->value;?>
</li>
				<li><a href="index.php?action=phpinfo">更多信息&raquo;</a></li>
			</ul>
		</div>
	</div>
	<div class="blog_info">bloginfo</div>
</div>