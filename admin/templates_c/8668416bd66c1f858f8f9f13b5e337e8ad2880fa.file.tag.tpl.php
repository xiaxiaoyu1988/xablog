<?php /* Smarty version Smarty3rc4, created on 2011-05-11 12:12:44
         compiled from "C:\xampp\htdocs\xablog/admin/view/tag.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175814dca7d3caca5a9-04994754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8668416bd66c1f858f8f9f13b5e337e8ad2880fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/tag.tpl',
      1 => 1302355094,
    ),
  ),
  'nocache_hash' => '175814dca7d3caca5a9-04994754',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
function hide_state(){
	$("#sort_state").fadeOut("slow");
	}
	setTimeout("hide_state()",3700);
	$(document).ready(function(){
		$(".sort_value").mouseover(function(){
			$(this).css("background","#EEEEEE");});
		$(".sort_value").mouseout(function(){
			$(this).css("background","white");});

		$(".sort_name").click(function(){
			if($(this).find(".sort_input_edit").attr("type") == "text"){return false;}
			var name = $.trim($(this).html());
			var m = $.trim($(this).text());
			//$(this).html("<input type=text value="+name+" class=sort_input_edit /> <input type='button' value='确定' class='buttoncss2' width='5px'><input type='button' value='取消' class='buttoncss2' width='5px'>");
			$(this).html("<input type=text value="+name+" class=sort_input_edit>");
			$(this).find(".sort_input_edit").focus();
			$(this).find(".sort_input_edit").bind("blur", function(){
				var n = $.trim($(this).val());
				var tag_id=$.trim($(this).parent().parent().find("#tag_id").val());
				if(n!=m&&n!=''){			
				    $.ajax({
						type: "POST",
						url: "<?php echo $_smarty_tpl->getVariable('url')->value;?>
model.php",
						data: "action=update_tag&tag_id=" + tag_id +"&tag_name="+n,
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
</script>
<form name="tag" method="post" action="tag.php?action=addtag">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="sort_header"><b>标签</b><?php echo $_smarty_tpl->getVariable('result')->value;?>
 <?php if ($_smarty_tpl->getVariable('flag')->value==0){?> <span
		class="sort_state" id="sort_state"> <img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />标签删除成功</span>
	<?php }elseif($_smarty_tpl->getVariable('flag')->value==1){?> <span class="sort_state" id="sort_state"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />标签添加成功</span>
	<?php }elseif($_smarty_tpl->getVariable('flag')->value==2){?> <span class="sort_state" id="sort_state"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />标签名重复或者为空</span>
	<?php }?>
		<span
		class="sort_state" id="sort_succ" style="display:none;"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />标签修改成功</span>
	</li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
		<tr>
			<td width="100px"><b>标签名称</b></td>
			<td width="380px"><b>描述</b></td>
			<td><b>操作</b></td>
		</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tagdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<tr class="sort_value">
				<td class="sort_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['tag_name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['tag_des'];?>
</td>
				<td id="del_sort"><a
					href="javascript:_confirm('tag','<?php echo $_smarty_tpl->tpl_vars['item']->value['tag_id'];?>
')">删除</a></td>
				<td><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['tag_id'];?>
" id="tag_id"></td>
			</tr>
			<?php }} ?>
		</tbody>
	</table>
	</div>
	</li>
</ul>
</div>
<div class="sort_right">
<div>
<h3>添加标签</h3>
</div>
<div class="sort_n">
<p>标签名称<input type="text" name="tag_name" class="sort_input" /></p>
<p>描述<input type="text" name="tag_des" class="sort_input" /></p>
<input type="submit" value="添加标签" class="buttoncss" /></div>
</div>
</div>
</form>
