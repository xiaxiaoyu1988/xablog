<?php /* Smarty version Smarty3rc4, created on 2011-05-11 13:41:11
         compiled from "C:\xampp\htdocs\xablog/admin/view/plugin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:255004dca91f7754286-08431009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '773de44c0679a89f7d19d7b2a11ad6f446cc1b77' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/plugin.tpl',
      1 => 1305121269,
    ),
  ),
  'nocache_hash' => '255004dca91f7754286-08431009',
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
	$(".n").mouseover(function(){
		$(this).attr('title', '未激活');
		});
	$(".y").mouseover(function(){
		$(this).attr('title', '已激活');
		});
	$(".n").click(function(){
		var name = $(this).parent().parent().parent().find(".sort_name").text();
		key = name +'/' +name + '.php';
	    $.ajax({
			type: "POST",
			url: "model.php",
			data: "action=plugin&stat=1&key=" +key,
			//dataType: "text",
			success: function(msg){
		    	document.location.reload();
			   },
			error: function(request,error){
			    alert('Error deleting item(s), try again later.');
			  }
			});
		});
	$(".y").click(function(){
		var name = $(this).parent().parent().parent().find(".sort_name").text();
		key = name +'/' +name + '.php';
	    $.ajax({
			type: "POST",
			url: "model.php",
			data: "action=plugin&stat=0&key=" +key,
			//dataType: "text",
			success: function(msg){
		    	document.location.reload();
			   },
			error: function(request,error){
			    alert('Error deleting item(s), try again later.');
			  }
			});
		});
	});

</script>
<form name="sort" method="post" action="link.php?action=addlink">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="sort_header"><b>插件管理</b><?php if ($_smarty_tpl->getVariable('flag')->value==0){?> 
	<?php }elseif($_smarty_tpl->getVariable('flag')->value==1){?> <span class="sort_state" id="sort_state"><img
		src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />插件添加成功</span> <?php }elseif($_smarty_tpl->getVariable('flag')->value==2){?> <span
		class="sort_state" id="sort_state"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />插件已存在或者为空</span>
	<?php }?> <span class="sort_state" id="sort_succ" style="display: none;"><img
		src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />插件修改成功</span></li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
			<tr>
				<th width="100px"><b>插件名称</b></th>
				<th width="40px"><b>状态</b></th>
				<th width="50px"><b>版本</b></th>
				<th>描述</th>
			</tr>
		</thead>

		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('plugins')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<tbody>
			<tr class="sort_value">
				<td class="sort_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['Name'];?>
</td>
				<td><a href="#" ><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/<?php echo $_smarty_tpl->tpl_vars['item']->value['Url'];?>
.gif" class="<?php echo $_smarty_tpl->tpl_vars['item']->value['Url'];?>
"/></a></td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['Version'];?>
</td>
				<td id="del_sort"><p style="font-size:10px;text-align:left;"><?php echo $_smarty_tpl->tpl_vars['item']->value['Description'];?>
</p>
							<p style="font-size:10px;text-align:left;">作者:<a href="mailto:<?php echo $_smarty_tpl->tpl_vars['item']->value['Email'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['Author'];?>
</a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['AuthorUrl'];?>
" target="_blank">作者主页</a></p></td>
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
<h3>插件</h3>
</div>
<div class="sort_n">
<p>demo<input type="text" name="link_name" class="sort_input" /></p>
<p>demo<input type="text" name="link_url" class="sort_input" /></p>
<p>demo<input type="text" name="link_des" class="sort_input" /></p>
<input type="submit" value="添加链接" class="buttoncss" /></div>
</div>
</div>
</form>
