<script>
$(document).ready(function(){
	$(".sort_state").hide();
	$("#update").click(function(){
	send();
})});

function send(){
	var post_title=$("#post_title").val();
	var post_content=content.getData();
	var post_tag=$("#post_tag").val();
	$.ajax({
	   type: "POST",
	   url: "<{$url}>model.php",
	   data: {action:'updatelog',title:post_title,content:post_content,tag:post_tag,post_id:"<{$post_id}>"},
	   success: function(msg){
		switch (msg){
		case '1':
			$("#update_state2").show();
	     	setTimeout('$("#update_state2").hide()',3700);
	     	break;
		case '2':
			$("#update_state3").show();
	     	setTimeout('$("#update_state3").hide()',3700);
	     	}
	   }
	});
}
</script>
<form name="update" method="post">
<div class='write'>
<div class="write_left">
<ul>
	<li class="write_header"><b>日志更新</b>
	 <span class="sort_state" id="update_state1"><img src="<{$path}>images/yes.png" />日志成功保存于：</span>
	 <span class="sort_state" id="update_state2"><img src="<{$path}>images/yes.png" />日志更新成功</span> 
	 <span class="sort_state" id="update_state3"><img src="<{$path}>images/no.png" />日志更新失败</span>
</li>
	<li>
	<hr />
	</li>
	<{foreach item=item key=key from=$postdata}>
	<li><input type="text" name="post_name" id="post_title"
		class="post_name" value="<{$item['post_title']}>"
		onfocus="post_name_hide(this)" onblur="post_name_bk(this)" /></li>
	<li><script type='text/javascript' src='ckeditor/ckeditor.js'></script>
	<textarea cols='80' id='content' name='content' rows='10'><{$item['post_content']}></textarea>
	<script type='text/javascript'>
			//<![CDATA[

				// This call can be placed at any point after the
				// <textarea>, or inside a <head><script> in a
				// window.onload event handler.

				// Replace the <textarea id='editor'> with an CKEditor
				// instance, using default configurations.
				var content=CKEDITOR.replace( 'content');
			//]]>
			</script></li>

</ul>
</div>
<div class="write_right">
<div>
<h3>发布</h3>
</div>
<div class="write_box"><input type=button value="更新日志" class="buttoncss" id="update"/>
</div>
</div>
<div class="write_right">
<div>
<h3>demo</h3>
</div>
<div class="write_box"><input type="text" id="post_pwd" name="post_pwd"
	class="write_input" value="<{$item['post_pwd']}>" /><span
	class="write_pwd"></span></div>
</div>
<{/foreach}>
<div class="write_right">
<div>
<h3>demo</h3>
</div>
<div class="write_box"><{foreach key=key item=item from=$sort}>
<p><input type="radio" name="sort_name" value="<{$item['sort_id']}>" />&nbsp;<{$item['sort_name']}></p>
<{/foreach}></div>
</div>
<div class="write_right">
<div>
<h3>demo</h3>
</div>
<div class="write_box"><input type="text" name="post_tag"
	class="write_input" />
	</div>
</div>
</div>
</form>
