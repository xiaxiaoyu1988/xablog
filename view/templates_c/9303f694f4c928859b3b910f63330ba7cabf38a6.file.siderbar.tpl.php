<?php /* Smarty version Smarty3rc4, created on 2011-05-06 08:24:38
         compiled from "C:\xampp\htdocs\xablog/view/templates/default/siderbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:90954dc3b046ec25c0-19264405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9303f694f4c928859b3b910f63330ba7cabf38a6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/view/templates/default/siderbar.tpl',
      1 => 1304669809,
    ),
  ),
  'nocache_hash' => '90954dc3b046ec25c0-19264405',
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