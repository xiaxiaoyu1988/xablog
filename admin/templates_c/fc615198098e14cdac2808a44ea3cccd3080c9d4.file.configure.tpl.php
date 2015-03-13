<?php /* Smarty version Smarty3rc4, created on 2011-06-02 08:24:00
         compiled from "C:\xampp\htdocs\xablog/admin/view/configure.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186914de748a0b45da6-38517111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc615198098e14cdac2808a44ea3cccd3080c9d4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/configure.tpl',
      1 => 1307003038,
    ),
  ),
  'nocache_hash' => '186914de748a0b45da6-38517111',
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
	<li class="sort_header"><b>当前模板</b><?php if ($_smarty_tpl->getVariable('flag')->value==0){?> 
	<?php }elseif($_smarty_tpl->getVariable('flag')->value==1){?> <span class="sort_state" id="sort_state"><img
		src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />页面添加成功</span> <?php }elseif($_smarty_tpl->getVariable('flag')->value==2){?> <span
		class="sort_state" id="sort_state"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />页面已存在或者为空</span>
	<?php }?> <span class="sort_state" id="sort_succ" style="display: none;"><img
		src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />页面修改成功</span></li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">

			<tr >
      <td width="27%">
	  <img src="../view/templates/<?php echo $_smarty_tpl->getVariable('tpl')->value;?>
/preview.jpg" width="300" height="225"  border="0" />	  </td>
	  <td width="73%" align="left">
	   当前模板：<?php echo $_smarty_tpl->getVariable('tpl')->value;?>
<br>
	  </td>	
			</tr>
	</table>
	</div>
	</li>
	<li>
	<div id="sss"></div>
	</li>
</ul>
</div>
<ul>
	<li class="sort_header"><b>模板列表</b></li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<p style="font-size:16px;margin-bottom:10px;">当前共有<?php echo $_smarty_tpl->getVariable('tpln')->value;?>
个模板</p>
	<table class="sortbox">
	<tr>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tpls')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			
			 <td align="center" width="300">
	           <a href="configure.php?action=usetpl&tpl=<?php echo $_smarty_tpl->tpl_vars['item']->value['tplfile'];?>
">
			  <img title="点击使用该模板" src="../view/templates/<?php echo $_smarty_tpl->tpl_vars['item']->value['tplfile'];?>
/preview.jpg" width="180" height="150" border="0" />
			  </a><br />
    		  <b><a href="configure.php?action=usetpl&tpl=<?php echo $_smarty_tpl->tpl_vars['item']->value['tplfile'];?>
" title="点击使用该模板"><?php echo $_smarty_tpl->tpl_vars['item']->value['tplname'];?>
</a></b><br />
             </td>			
			
		<?php }} ?>
		</tr>

	</table>
	</div>
	</li>
	<li>
	<div id="sss"></div>
	</li>
</ul>
</div>
</form>
