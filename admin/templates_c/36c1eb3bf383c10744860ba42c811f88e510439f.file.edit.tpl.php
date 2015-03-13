<?php /* Smarty version Smarty3rc4, created on 2011-05-11 14:25:11
         compiled from "C:\xampp\htdocs\xablog/admin/view/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160604dca9c47190487-51192369%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36c1eb3bf383c10744860ba42c811f88e510439f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/edit.tpl',
      1 => 1302353930,
    ),
  ),
  'nocache_hash' => '160604dca9c47190487-51192369',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
$(document).ready(function(){
	$(".sort_state").hide();
	$("#update").click(function(){
	send();
})});

function send(){
	var post_title=$("#post_title").val();
	var post_content=content.getData();
	var post_tag=$("#post_tag").val();
	$.ajax({
	   type: "POST",
	   url: "<?php echo $_smarty_tpl->getVariable('url')->value;?>
model.php",
	   data: {action:'updatelog',title:post_title,content:post_content,tag:post_tag,post_id:"<?php echo $_smarty_tpl->getVariable('post_id')->value;?>
"},
	   success: function(msg){
		switch (msg){
		case '1':
			$("#update_state2").show();
	     	setTimeout('$("#update_state2").hide()',3700);
	     	break;
		case '2':
			$("#update_state3").show();
	     	setTimeout('$("#update_state3").hide()',3700);
	     	}
	   }
	});
}
</script>
<form name="update" method="post">
<div class='write'>
<div class="write_left">
<ul>
	<li class="write_header"><b>日志更新</b>
	 <span class="sort_state" id="update_state1"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />日志成功保存于：</span>
	 <span class="sort_state" id="update_state2"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />日志更新成功</span> 
	 <span class="sort_state" id="update_state3"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />日志更新失败</span>
</li>
	<li>
	<hr />
	</li>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('postdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<li><input type="text" name="post_name" id="post_title"
		class="post_name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['post_title'];?>
"
		onfocus="post_name_hide(this)" onblur="post_name_bk(this)" /></li>
	<li><script type='text/javascript' src='ckeditor/ckeditor.js'></script>
	<textarea cols='80' id='content' name='content' rows='10'><?php echo $_smarty_tpl->tpl_vars['item']->value['post_content'];?>
</textarea>
	<script type='text/javascript'>
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
<div class="write_box"><input type=button value="更新日志" class="buttoncss" id="update"/>
</div>
</div>
<div class="write_right">
<div>
<h3>demo</h3>
</div>
<div class="write_box"><input type="text" id="post_pwd" name="post_pwd"
	class="write_input" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['post_pwd'];?>
" /><span
	class="write_pwd"></span></div>
</div>
<?php }} ?>
<div class="write_right">
<div>
<h3>demo</h3>
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
<h3>demo</h3>
</div>
<div class="write_box"><input type="text" name="post_tag"
	class="write_input" />
	</div>
</div>
</div>
</form>
