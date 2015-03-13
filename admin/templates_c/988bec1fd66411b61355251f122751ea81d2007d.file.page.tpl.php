<?php /* Smarty version Smarty3rc4, created on 2011-06-01 06:55:40
         compiled from "C:\xampp\htdocs\xablog/admin/view/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110224de5e26ce95b84-84147552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '988bec1fd66411b61355251f122751ea81d2007d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/page.tpl',
      1 => 1306911201,
    ),
  ),
  'nocache_hash' => '110224de5e26ce95b84-84147552',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
function hide_state(){
$("#sort_state").fadeOut("slow");
}
setTimeout("hide_state()",3700)

$(document).ready(function(){
	$(".sort_value").mouseover(function(){
		$(this).css("background","#EEEEEE");});
	$(".sort_value").mouseout(function(){
		$(this).css("background","white");});
	$("#addpage").click(function(){
		$(this).hide();
		$(".sortbox").hide();
		$("#editor").show();
		});
	$("#ensure").click(function(){
		var post_title=$("#post_title").val();
		var post_content=content.getData();
		$.ajax({
		   type: "POST",
		   url: "<?php echo $_smarty_tpl->getVariable('url')->value;?>
model.php",
		   data: {action:'addpage',title:post_title,content:post_content},
		   success: function(msg){
                alert("页面添加成功");
                document.location.reload();
		   }
		});
		});
	});

</script>
<form name="sort" method="post" action="">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="write_header"><b>添加页面</b>
</li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
			<tr>
				<th width="100px"><b>页面</b></th>
				<th><b>操作</b></th>
			</tr>
		</thead>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pagedata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<tbody>
			<tr class="sort_value">
				<td class="sort_name" width="260px"><?php echo $_smarty_tpl->tpl_vars['item']->value['page_title'];?>
</td>
				<td id="del_sort" width="400px"><a
					href="javascript:_confirm('page','<?php echo $_smarty_tpl->tpl_vars['item']->value['page_id'];?>
')">删除</a></td>
				<td><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['page_id'];?>
" id="link_id"></td>
			</tr>
		</tbody>
		<?php }} ?>
	</table>
	</div>
	</li>
	<li>
	<div id="sss" style="margin-top:20px;">
	<input type="button" value="添加页面" class="buttoncss" id="addpage"/>
	<div style="display:none;" id="editor">
	<script type='text/javascript' src='ckeditor/ckeditor.js'></script>
	<label style="font-size:18px;background-color:#EEE;">标题</label>
	<br />
	<input type="text" name="post_name" id="post_title"
		class="post_name"  />
	<textarea cols='80' id='content' name='content' rows='10'><?php echo $_smarty_tpl->getVariable('item')->value['post_content'];?>
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
			</script>
		<input type="button" value="发布" class="buttoncss" id="ensure"/>	
			</div></div>
	</li>
</ul>
</div>
</div>
</form>
