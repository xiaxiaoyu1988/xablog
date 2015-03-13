<?php /* Smarty version Smarty3rc4, created on 2011-05-11 09:23:44
         compiled from "C:\xampp\htdocs\xablog/admin/view/user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:249134dca55a0051848-57869863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b8927aaaa011d8f87f21968cbfb9e098b1c6b53' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/user.tpl',
      1 => 1301731201,
    ),
  ),
  'nocache_hash' => '249134dca55a0051848-57869863',
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
	//$(".sort_state").hide();
	$("#update_pwd").click(function(){
		if(checkpwd()){
				update();
			}
		});
	});

function checkpwd(){
	if($("#pwd_new").val()!=$("#pwd_new2").val()||$("#pwd_new").val()==''){
		alert("两次输入的新密码不一致 或者密码为空，请检查");
		return false;
		}
	else{
		return true;
		}
}

function update(){
	var pwd_old=$("#pwd_old").val();
	var pwd_new=$("#pwd_new").val();
	    $.ajax({
		type: "POST",
		url: "<?php echo $_smarty_tpl->getVariable('url')->value;?>
model.php",
		data: "action=update_pwd&pwd_old="+pwd_old+"&pwd_new=" +pwd_new,
		//dataType: "text",
		success: function(msg){
	    	//document.location.reload();
	    	alert(msg);
		   },
		error: function(request,error){
		    alert('Error deleting item(s), try again later.');
		  }
		}
	    );
	}


</script>
<form name="user" method="post" action="user.php?action=update_user" enctype="multipart/form-data">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="sort_header"><b>个人资料</b> <?php if ($_smarty_tpl->getVariable('flag')->value==1){?> <span
		class="sort_state" id="sort_state"> <img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png" />资料更新成功</span>
	<?php }elseif($_smarty_tpl->getVariable('flag')->value==2){?> <span class="sort_state" id="sort_state"><img
		src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />资料更新失败</span> <?php }elseif($_smarty_tpl->getVariable('flag')->value==5){?> <span
		class="sort_state" id="sort_state"><img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/no.png" />你做了什么见不得人的事</span>
	<?php }?></li>
	<li>
	<hr width="690px" />
	</li>
	<li>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('user_data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<div class="info">
	<p>电子邮件</p>
	<p><input type="text" id="email" class="inputcss" name="email" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_email'];?>
"/></p>
	<p>头像:(推荐jpg或者png图片)</p>
	<p><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_face'];?>
" width="120px" height="120px"/><input type="hidden" name="user_face" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_face'];?>
" /></p>
	<p><input type="file" id="admin_pic" class="inputcss file" name="admin_pic"/></p>
	<p>个人描述(say what you want to say!)</p>
	<p><textarea class="admin_des" id="admin_des" name="admin_des" ><?php echo $_smarty_tpl->tpl_vars['item']->value['user_des'];?>
</textarea></p>
	<p><input type="submit" id="save_info" class="buttoncss" value="保存资料" /></p>
	</div>
	<?php }} ?>
	</li>
</ul>
</div>
<div class="sort_right">
<div>
<h3>更改密码</h3>
</div>
<div class="sort_n">
<p>当前密码<input type="password" id="pwd_old" class="sort_input" /></p>
<p>新密码<input type="password" id="pwd_new" class="sort_input" /></p>
<p>重复新密码<input type="password" id="pwd_new2" class="sort_input" /></p>
<input type="button" value="确认修改" class="buttoncss" id="update_pwd"/></div>
</div>
</div>
</form>

