<?php /* Smarty version Smarty3rc4, created on 2011-06-01 07:26:48
         compiled from "C:\xampp\htdocs\xablog/admin/view/comment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9964de5e9b89bb417-60076555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7230b6f99862403c84fc31037fb34986a972321b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/comment.tpl',
      1 => 1306913205,
    ),
  ),
  'nocache_hash' => '9964de5e9b89bb417-60076555',
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

	$("#cmhide").click(function(){
		    comment_id=$(this).parent().parent().find("#comment_id").val()
			$.ajax({
				   type: "POST",
				   url: "<?php echo $_smarty_tpl->getVariable('url')->value;?>
model.php",
				   data: {action:'updatecomm',comment_id:comment_id,stat:'1'},
				   success: function(msg){
					   $("#sort_succ").show();
				       document.location.reload();
				   }
				});
		});
	$("#cmret").click(function(){
	    comment_id=$(this).parent().parent().find("#comment_id").val()
		$.ajax({
			   type: "POST",
			   url: "<?php echo $_smarty_tpl->getVariable('url')->value;?>
model.php",
			   data: {action:'updatecomm',comment_id:comment_id,stat:'0'},
			   success: function(msg){
				   $("#sort_succ").show();
			       document.location.reload();
			   }
			});
		});
	});

</script>
<form name="sort" method="post" action="link.php?action=addlink">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="sort_header"><b>评论</b><?php if ($_smarty_tpl->getVariable('flag')->value==0){?> <span
		class="sort_state" id="sort_state"> <img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />评论删除成功</span>
	<?php }elseif($_smarty_tpl->getVariable('flag')->value==1){?> <span class="sort_state" id="sort_state"><img
		src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />评论添加成功</span> <?php }elseif($_smarty_tpl->getVariable('flag')->value==2){?> <span
		class="sort_state" id="sort_state"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />评论已存在或者为空</span>
	<?php }?> <span class="sort_state" id="sort_succ" style="display: none;"><img
		src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />评论修改成功</span></li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
			<tr>
				<th width="60px"><b>评论人</b></th>
				<th width="300px"><b>内容</b></th>
				<th width="50px"><b>Email</b></th>
				<th><b>操作</b></th>
			</tr>
		</thead>

		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('commentdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<tbody>
			<tr class="sort_value">
				<td class="sort_name">
				<a href="http://<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['comment_poster'];?>
</a></td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment_content'];?>
</td>
				<td><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_email'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['comment_email'];?>
</a></td>
				<td id="del_sort"><a
					href="javascript:_confirm('comm','<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_id'];?>
')">删除</a>&nbsp;
					<?php if ($_smarty_tpl->tpl_vars['item']->value['comment_hide']==0){?>
					<a href="#" id="cmhide">屏蔽</a>
					<?php }else{ ?>
					<a href="#" id="cmret">恢复</a>
					<?php }?>
				</td>
				<td><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_id'];?>
" id="comment_id"></td>
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
<h3>评论</h3>
</div>
<div class="sort_n">
<p>demo<input type="text" name="link_name" class="sort_input" /></p>
<p>demo<input type="text" name="link_url" class="sort_input" /></p>
<p>demo<input type="text" name="link_des" class="sort_input" /></p>
<input type="submit" value="demo" class="buttoncss" /></div>
</div>
</div>
</form>
