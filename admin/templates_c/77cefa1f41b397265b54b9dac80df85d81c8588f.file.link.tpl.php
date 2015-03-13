<?php /* Smarty version Smarty3rc4, created on 2011-05-11 13:55:10
         compiled from "C:\xampp\htdocs\xablog/admin/view/link.tpl" */ ?>
<?php /*%%SmartyHeaderCode:269654dca953eec0339-62588182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77cefa1f41b397265b54b9dac80df85d81c8588f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/link.tpl',
      1 => 1305122108,
    ),
  ),
  'nocache_hash' => '269654dca953eec0339-62588182',
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
	});

</script>
<form name="sort" method="post" action="link.php?action=addlink">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="sort_header"><b>链接</b><?php if ($_smarty_tpl->getVariable('flag')->value==0){?> <span
		class="sort_state" id="sort_state"> <img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />链接删除成功</span>
	<?php }elseif($_smarty_tpl->getVariable('flag')->value==1){?> <span class="sort_state" id="sort_state"><img
		src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />链接添加成功</span> <?php }elseif($_smarty_tpl->getVariable('flag')->value==2){?> <span
		class="sort_state" id="sort_state"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />链接已存在或者为空</span>
	<?php }?> <span class="sort_state" id="sort_succ" style="display: none;"><img
		src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />链接修改成功</span></li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
			<tr>
				<th width="120px"><b>链接名称</b></th>
				<th width="400px"><b>描述</b></th>
				<th width="50px"><b>查看</b></th>
				<th><b>操作</b></th>
			</tr>
		</thead>

		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('linkdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<tbody>
			<tr class="sort_value">
				<td class="sort_name"><a href="link.php?action=link_edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['link_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['link_name'];?>
</a></td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['link_des'];?>
</td>
				<td><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
" target="_blank"><img
					src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/_blank.gif" class="blank" /></a></td>
				<td id="del_sort"><a
					href="javascript:_confirm('link','<?php echo $_smarty_tpl->tpl_vars['item']->value['link_id'];?>
')">删除</a></td>
				<td><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['link_id'];?>
" id="link_id"></td>
			<td>
			<div style="display:none" ">
				<p><input name="name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['link_name'];?>
"/></p>
				<p><input name="name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['link_des'];?>
"/></p>
				<p><input name="name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
"/></p>
				<p><input type="button" value="确定" class="buttoncss"/>
				<input type="button" value="取消" class="buttoncss" /></p> 
			</div></td>
			</tr>
		</tbody>
		<?php }} ?>

	</table>
	</div>
	</li>
	<li>
	<div id="sss"></div>
	</li>
</ul>
</div>
<div class="sort_right">
<div>
<h3>添加链接</h3>
</div>
<div class="sort_n">
<p>链接名称<input type="text" name="link_name" class="sort_input" /></p>
<p>地址<input type="text" name="link_url" class="sort_input" /></p>
<p>描述<input type="text" name="link_des" class="sort_input" /></p>
<input type="submit" value="添加链接" class="buttoncss" /></div>
</div>
</div>
</form>
