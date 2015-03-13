<?php /* Smarty version Smarty3rc4, created on 2011-06-02 00:52:47
         compiled from "C:\xampp\htdocs\xablog/view/templates/wp/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132014de6dedf28d0f2-87292683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d9068323150082e0daad2a58cc1fac3876e9bd5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/view/templates/wp/page.tpl',
      1 => 1306910393,
    ),
  ),
  'nocache_hash' => '132014de6dedf28d0f2-87292683',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pageonly')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<div class="post">
<p class="posts_title"><?php echo $_smarty_tpl->tpl_vars['item']->value['page_title'];?>
</p>
<span class="post_info"><?php echo $_smarty_tpl->tpl_vars['item']->value['page_date'];?>
</span>
<div class="post_content"><?php echo $_smarty_tpl->tpl_vars['item']->value['page_content'];?>
</div>
<div class="post_sort">
</div>
<div class="nbpost">
<div class="nb_left">
</div>
<div class="clear"></div>
</div>
</div>
<?php }} ?>
<div>

</div>

</div>
