<?php /* Smarty version Smarty3rc4, created on 2011-05-11 11:44:48
         compiled from "C:\xampp\htdocs\xablog/admin/view/sort.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3044dca76b0ddbc69-56935768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5db1194b0733b7f1cccb452ae3fab90f7c1af645' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/sort.tpl',
      1 => 1302616121,
    ),
  ),
  'nocache_hash' => '3044dca76b0ddbc69-56935768',
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
	$(".sort_name").click(function(){
		if($(this).find(".sort_input_edit").attr("type") == "text"){return false;}
		var name = $.trim($(this).html());
		var m = $.trim($(this).text());
		//$(this).html("<input type=text value="+name+" class=sort_input_edit /> <input type='button' value='确定' class='buttoncss2' width='5px'><input type='button' value='取消' class='buttoncss2' width='5px'>");
		$(this).html("<input type=text value="+name+" class=sort_input_edit>");
		$(this).find(".sort_input_edit").focus();
		$(this).find(".sort_input_edit").bind("blur", function(){
			var n = $.trim($(this).val());
			var sort_id=$.trim($(this).parent().parent().find("#sort_id").val());
			if(n!=m&&n!=''){			
			    $.ajax({
					type: "POST",
					url: "<?php echo $_smarty_tpl->getVariable('url')->value;?>
model.php",
					data: "action=update_sort&sort_id=" + sort_id +"&sort_name="+n,
					//dataType: "text",
					success: function(msg){
					  	$("#sort_succ").show("slow");
					  	setTimeout("reloading()",1000);		    	
				    	//alert(msg);
					   },
					error: function(request,error){
					    alert('Error deleting item(s), try again later.');
					  }
					}
				    )
				}else{
			$(this).parent().html(name);}
			});
		});

	});
$(document).ready(function(){
	$(".sort_value").mouseover(function(){
		$(this).css("background","#EEEEEE");});
	$(".sort_value").mouseout(function(){
		$(this).css("background","white");});
	});

</script>
<form name="sort" method="post" action="sort.php?action=addsort">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="sort_header"><b>分类</b><?php if ($_smarty_tpl->getVariable('flag')->value==0){?> <span
		class="sort_state" id="sort_state"> <img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />分类删除成功</span>
	<?php }elseif($_smarty_tpl->getVariable('flag')->value==1){?> <span class="sort_state" id="sort_state"><img
		src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />分类添加成功</span> <?php }elseif($_smarty_tpl->getVariable('flag')->value==2){?> <span
		class="sort_state" id="sort_state"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />分类已存在或者为空</span>
	<?php }?>
	<span
		class="sort_state" id="sort_succ" style="display:none;"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />分类修改成功</span>
	</li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
			<tr>
				<th width="120px"><b>分类名称</b></th>
				<th width="400px"><b>描述</b></th>
				<th width="50px"><b>日志数</b></th>
				<th><b>操作</b></th>
			</tr>
		</thead>
		
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sort')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<tbody>
			<tr class="sort_value">
				<td class="sort_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['sort_name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['sort_des'];?>
</td>
				<td><a href="post.php?action=list_by_sort&sort_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['sort_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['post_num'];?>
</a></td>
				<td id="del_sort"><a
					href="javascript:_confirm('sort','<?php echo $_smarty_tpl->tpl_vars['item']->value['sort_id'];?>
')">删除</a></td>
				<td><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort_id'];?>
" id="sort_id"></td>
			</tr>
			</tbody>
			<?php }} ?>
		
	</table>
	</div>
	</li>
</ul>
</div>
<div class="sort_right">
<div>
<h3>添加分类</h3>
</div>
<div class="sort_n">
<p>分类名称<input type="text" name="sort_name" class="sort_input" /></p>
<p>描述<input type="text" name="sort_des" class="sort_input" /></p>
<input type="submit" value="添加分类" class="buttoncss" /></div>
</div>
</div>
</form>
