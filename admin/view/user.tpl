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
		url: "<{$url}>model.php",
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
	<li class="sort_header"><b>个人资料</b> <{if $flag==1}> <span
		class="sort_state" id="sort_state"> <img src="<{$path}>images/yes.png" />资料更新成功</span>
	<{else if $flag==2}> <span class="sort_state" id="sort_state"><img
		src="<{$path}>images/no.png" />资料更新失败</span> <{else if $flag==5}> <span
		class="sort_state" id="sort_state"><img src="<{$path}>images/no.png" />你做了什么见不得人的事</span>
	<{/if}></li>
	<li>
	<hr width="690px" />
	</li>
	<li>
	<{foreach key=key item=item from=$user_data}>
	<div class="info">
	<p>电子邮件</p>
	<p><input type="text" id="email" class="inputcss" name="email" value="<{$item['user_email']}>"/></p>
	<p>头像:(推荐jpg或者png图片)</p>
	<p><img src="<{$item['user_face']}>" width="120px" height="120px"/><input type="hidden" name="user_face" value="<{$item['user_face']}>" /></p>
	<p><input type="file" id="admin_pic" class="inputcss file" name="admin_pic"/></p>
	<p>个人描述(say what you want to say!)</p>
	<p><textarea class="admin_des" id="admin_des" name="admin_des" ><{$item['user_des']}></textarea></p>
	<p><input type="submit" id="save_info" class="buttoncss" value="保存资料" /></p>
	</div>
	<{/foreach}>
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

