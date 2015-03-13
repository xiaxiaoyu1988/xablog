<?php /* Smarty version Smarty3rc4, created on 2011-05-11 14:11:04
         compiled from "C:\xampp\htdocs\xablog/admin/view/linkedit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:314074dca98f89a1409-09678353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5da6e410e5b310ed65152e8b60ed65194ec5716c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/linkedit.tpl',
      1 => 1305123061,
    ),
  ),
  'nocache_hash' => '314074dca98f89a1409-09678353',
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
<form name="sort" method="post" action="link.php">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="sort_header"><b>链接</b></li>
	<li>
	<hr width=600px/>
	</li>
	<li>
	<div>
	<center>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('link_data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<div class="sort_n">
	<p>链接名称:<input type="text" name="link_name" class="sort_input" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['link_name'];?>
"/></p>
	<p>链接地址:<input type="text" name="link_url" class="sort_input" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
"/></p>
	<p>链接描述:<input type="text" name="link_des" class="sort_input" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['link_des'];?>
"/></p>
	<input type="submit" value="取消" class="buttoncss" /> <input type="button" value="确定" class="buttoncss"></div>
	<?php }} ?>
	</center>
	</div>
	</li>
</ul>
</div>
</div>
</form>
