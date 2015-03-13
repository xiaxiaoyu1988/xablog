<?php /* Smarty version Smarty3rc4, created on 2011-06-01 07:28:55
         compiled from "C:\xampp\htdocs\xablog/admin/view/post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106344de5ea37f3b342-04797448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1bf9e532d9e9750a61f0c01d92bc1fe83d8c599' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/post.tpl',
      1 => 1306913335,
    ),
  ),
  'nocache_hash' => '106344de5ea37f3b342-04797448',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php
?>
<script>
function hide_state(){
$("#sort_state").fadeOut("slow");
}
setTimeout("hide_state()",3700);

$(document).ready(function(){
	$("#post_all").click(function(){
		CheckAll(this.form);
		});
	$(".post_value").mouseover(function(){
		$(this).css("background","#EEEEEE");});
	$(".post_value").mouseout(function(){
		$(this).css("background","white");});
	});
$(document).ready(function(){
	$(".sort_state").hide();
	$("#del").click(function(){del();});
	});

function changesort(obj){
	var selectedItems = new Array();
	var sort_id=obj.value;
	$("input[name='post_del[]']:checked").each(function() {selectedItems.push($(this).val());});
	if (selectedItems .length == 0)
	    alert("请选择要操作的文章.");
	else if(confirm("是否更改分类？")){
	    $.ajax({
		type: "POST",
		url: "<?php echo $_smarty_tpl->getVariable('url')->value;?>
model.php",
		data: "action=changesort&sort_id="+sort_id+"&change_id=" + selectedItems.join(','),
		//dataType: "text",
		success: function(msg){
	    	document.location.reload();
	    	//alert(msg);
		   },
		error: function(request,error){
		    alert('Error deleting item(s), try again later.');
		  }
		}
	    )
	}
}

function del(){
	var selectedItems = new Array();
	$("input[name='post_del[]']:checked").each(function() {selectedItems.push($(this).val());});
	
	if (selectedItems .length == 0)
	    alert("请选择要操作的文章.");
	else if(confirm("是否删除文章？")){
	    $.ajax({
		type: "POST",
		url: "<?php echo $_smarty_tpl->getVariable('url')->value;?>
model.php",
		data: "action=dellog&del_id=" + selectedItems.join(','),
		//dataType: "text",
		success: function(msg){
	    	document.location.reload();
	    	//alert(msg);
		   },
		error: function(request,error){
		    alert('Error deleting item(s), try again later.');
		  }
		}
	    )
	}
	
}

</script>
<form name="post" method="post" action="#">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="write_header"><b>日志更新</b> <span class="sort_state"
		id="update_state1"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />日志成功保存于：</span>
	<span class="sort_state" id="update_state2"><img
		src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />日志删除成功</span> <span class="sort_state"
		id="update_state3"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />日志删除失败</span></li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
			<tr>
				<th width="10px"><input type="checkbox" name="chkall" id="post_all" /></th>
				<th width="160px"><b>标题</b></th>
				<th width="40px"><b>查看</b></th>
				<th width="40px"><b>作者</b></th>
				<th width="40px"><b>分类</b></th>
				<th width="120px"><b>时间</b></th>
				<th width="40px"><b>阅读</b></th>
				<th width="40px"><b>评论</b></th>
			</tr>
		</thead>
		<tbody id="post_data">
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('postdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<tr class="post_value">
				<td><input type="checkbox" name="post_del[]"
					value="<?php echo $_smarty_tpl->tpl_vars['item']->value['post_id'];?>
" class="check_css" /></td>
				<td class="post_title"><a
					href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
write.php?action=edit&&post_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['post_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['post_title'];?>
</a></td>
				<td><a href="../?post_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['post_id'];?>
" target="_blank"><img
					src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/_blank.gif" class="blank" /></a></td>
				<td><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['post_author'];?>
</a></td>
				<td><a href="post.php?action=list_by_sort&sort_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['sort_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['post_count'];?>
</a>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['post_date'];?>
</td>
				<td><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['post_views'];?>
</a></td>
				<td><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['post_comments'];?>
</a></td>
			</tr>
			<?php }} ?>
		</tbody>
	</table>
	</div>
	</li>
</ul>

</form>
</div>
<div class="sort_right">
<div>
<h3>选中项</h3>
</div>
<div class="sort_n">
<div class="ui-state-default ui-corner-all li_w float_left" title="删除文章" id="del"><span class="ui-icon ui-icon-trash"></span></div>
&nbsp;
<div class="ui-state-default ui-corner-all li_w float_left" title="置顶"><span class="ui-icon ui-icon-pin-s"></span></div>
<select id="sort_change" class="sort_select" onChange="changesort(this);">
	<option selectd="selected">移动到分类.....</option>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sortdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?> 
   <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort_id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item']->value['sort_name'];?>
</option>
	<?php }} ?>
	
</select>
</div>
</div>
<div class="sort_right">
<div>
<h3>过滤</h3>
</div>
<div class="sort_n">
<p>分类：
	 <a href="post.php">All</a>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sortdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?> 
 <a href="post.php?action=list_by_sort&sort_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['sort_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['sort_name'];?>
</a>
	<?php }} ?>

</p>
<br />
<p>
标签：
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tagdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?> 
    <a href="post.php?action=list_by_tag&tag_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['tag_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['tag_name'];?>
</a>
	<?php }} ?>

</p>
</div>
</div>
</div>

