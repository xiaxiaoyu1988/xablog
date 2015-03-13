<?php /* Smarty version Smarty3rc4, created on 2011-05-11 12:13:43
         compiled from "C:\xampp\htdocs\xablog/admin/view/write.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91864dca7d77bddff4-39953621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e1a5dc883838340ba68f14f974109cacfea4da0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/write.tpl',
      1 => 1302335292,
    ),
  ),
  'nocache_hash' => '91864dca7d77bddff4-39953621',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
function hide(){
	var dis=document.getElementById('write_state');
	dis.style.display='none';
	//alert("hello");
}
setTimeout("hide()",4000);
$(document).ready(function(){
	$("#ch_tag").click(function(){
		menu_sub_hide('tags');		
	});
	$(".tag_list").click(function(){
		var tag_name=$(this).text();
		$("#show_tag").append("<span id=\"tag_list\" title=\"单击以删除标签\" style=\"cursor:pointer;\">"+tag_name+"</span>&nbsp;");
		$(this).hide();
		});
	$("#add_tag").click(function(){
		var tag_n = $("#post_tag").val();
		if(tag_n==''){
			$("#post_tag").select();
			}
		else {
			$.ajax({
				type: "POST",
				url: "<?php echo $_smarty_tpl->getVariable('url')->value;?>
model.php",
				data: "action=add_tag&tag_name="+tag_n,
				//dataType: "text",
				success: function(msg){    	
			    	//alert(msg);
					$("#show_tag").append("<span id=\"tag_list\" title=\"单击以删除标签\" style=\"cursor:pointer;\">"+tag_n+"</span>&nbsp;");
					
				   },
				error: function(request,error){
				    alert('Error, try again later.');
				  }

				});
		}
		});
	$("#show_tag").mouseover(function(){
	//	$("#tag_list").mouseover(function(){$(this).css('cursor','not-allowed ');});
		$("#tag_list").click(function(){$(this).remove();});
		});
	$("form:first").submit(function(){
		var tag_list = [];
		$("#show_tag").find("#tag_list").each(function(){
				tag_list.push($(this).text());
			});
		$("#tag_li").attr('value',tag_list);
		});
});

</script>
<form name="write" method="post" action="write.php?action=addlog">
<div class='write'>
<div class="write_left">
<ul>
	<li class="write_header"><b>写日志</b><?php if ($_smarty_tpl->getVariable('flag')->value==0){?> <span
		class="sort_state" id="write_state"> <img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />日志成功保存于：<?php echo $_smarty_tpl->getVariable('savetime')->value;?>
</span>
	<?php }elseif($_smarty_tpl->getVariable('flag')->value==1){?> <span class="sort_state" id="write_state"><img
		src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />日志发布成功</span> <?php }elseif($_smarty_tpl->getVariable('flag')->value==2){?> <span
		class="sort_state" id="write_state"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />日志添加失败</span>
	<?php }?></li>
	<li>
	<hr />
	</li>
	<li><input type="text" name="post_name" id="post_name"
		class="post_name" value="请输入文章标题" onfocus="post_name_hide(this)"
		onblur="post_name_bk(this)" /></li>
	<li><script type='text/javascript' src='ckeditor/ckeditor.js'></script>
	<textarea cols='80' id='content' name='content' rows='10'></textarea> <script
		type='text/javascript'>
			//<![CDATA[

				// This call can be placed at any point after the
				// <textarea>, or inside a <head><script> in a
				// window.onload event handler.

				// Replace the <textarea id='editor'> with an CKEditor
				// instance, using default configurations.
				var content=CKEDITOR.replace( 'content');
			//]]>
			</script></li>
</ul>
</div>
<div class="write_right">
<div>
<h3>发布</h3>
</div>
<div class="write_box"><input type="button" value="保存草稿"
	class="buttoncss" /><input type="submit" value="发布日志" class="buttoncss" id="save_log"/>
</div>
</div>
<div class="write_right">
<div>
<h3>分类目录</h3>
</div>
<div class="write_box"><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sort')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<p><input type="radio" name="sort_name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort_id'];?>
" />&nbsp;<?php echo $_smarty_tpl->tpl_vars['item']->value['sort_name'];?>
</p>
<?php }} ?></div>
</div>
<div class="write_right">
<div>
<h3>标签</h3>
</div>
<div class="write_box">
<input type="text" id="post_tag"class="write_input" style="width:90px;"/><input type="button" value="添加" class="buttoncss" id="add_tag"/>
<div id="show_tag"></div><input type="hidden" id="tag_li" name="tag_list"/>
<span class="write_pwd"><a href="#" id="ch_tag">选择已有标签</a></span>
<div id="tags" class="tags">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tagdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<a href="#" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['tag_id'];?>
" class="tag_list"><?php echo $_smarty_tpl->tpl_vars['item']->value['tag_name'];?>
</a>
<?php }} ?>
</div>
</div>
</div>
</div>
</form>
