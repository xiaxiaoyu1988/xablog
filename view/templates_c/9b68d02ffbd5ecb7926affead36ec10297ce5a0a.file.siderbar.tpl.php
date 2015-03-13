<?php /* Smarty version Smarty3rc4, created on 2011-06-01 14:38:46
         compiled from "C:\xampp\htdocs\xablog/view/templates/wp/siderbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:260784de64ef6092993-68352595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b68d02ffbd5ecb7926affead36ec10297ce5a0a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/view/templates/wp/siderbar.tpl',
      1 => 1304669809,
    ),
  ),
  'nocache_hash' => '260784de64ef6092993-68352595',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script language="javascript">
$(function(){
				// Datepicker
			$( "#datepicker" ).datepicker( $.datepicker.regional[ "zh-CN" ] );				
			});

</script>
<div class="sidebar">
<?php echo $_smarty_tpl->getVariable('widget')->value;?>

</div>