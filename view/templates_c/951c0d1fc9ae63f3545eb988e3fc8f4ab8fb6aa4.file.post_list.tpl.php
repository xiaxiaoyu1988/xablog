<?php /* Smarty version Smarty3rc4, created on 2011-06-01 14:38:45
         compiled from "C:\xampp\htdocs\xablog/view/templates/wp/post_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84734de64ef5e8a383-25091451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '951c0d1fc9ae63f3545eb988e3fc8f4ab8fb6aa4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/view/templates/wp/post_list.tpl',
      1 => 1302699003,
    ),
  ),
  'nocache_hash' => '84734de64ef5e8a383-25091451',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('postdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<div class="post">
<p class="post_title"><a href="index.php?post_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['post_id'];?>
" title="点我细细看"><?php echo $_smarty_tpl->tpl_vars['item']->value['post_title'];?>
</a></p>
<span class="post_info"><?php echo $_smarty_tpl->tpl_vars['item']->value['post_date'];?>
|<?php echo $_smarty_tpl->tpl_vars['item']->value['post_views'];?>
次浏览|<?php echo $_smarty_tpl->tpl_vars['item']->value['post_comments'];?>
条评论|<?php echo $_smarty_tpl->tpl_vars['item']->value['post_author'];?>
发布</span>
<div class="post_content">
<?php echo $_smarty_tpl->tpl_vars['item']->value['post_content'];?>
 
</div>
<div class="post_sort">
<p>发布于:&nbsp;<a href="index.php?sort_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['sort_id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['post_count'];?>
目录"><?php echo $_smarty_tpl->tpl_vars['item']->value['post_count'];?>
</a>.</p>
</div>
</div>
<?php }} ?>
</div>
