<script>
function hide(){
	var dis=document.getElementById('write_state');
	dis.style.display='none';
	//alert("hello");
}
setTimeout("hide()",4000);
$(document).ready(function(){
	$("#ch_tag").click(function(){
		menu_sub_hide('tags');		
	});
	$(".tag_list").click(function(){
		var tag_name=$(this).text();
		$("#show_tag").append("<span id=\"tag_list\" title=\"单击以删除标签\" style=\"cursor:pointer;\">"+tag_name+"</span>&nbsp;");
		$(this).hide();
		});
	$("#add_tag").click(function(){
		var tag_n = $("#post_tag").val();
		if(tag_n==''){
			$("#post_tag").select();
			}
		else {
			$.ajax({
				type: "POST",
				url: "<{$url}>model.php",
				data: "action=add_tag&tag_name="+tag_n,
				//dataType: "text",
				success: function(msg){    	
			    	//alert(msg);
					$("#show_tag").append("<span id=\"tag_list\" title=\"单击以删除标签\" style=\"cursor:pointer;\">"+tag_n+"</span>&nbsp;");
					
				   },
				error: function(request,error){
				    alert('Error, try again later.');
				  }

				});
		}
		});
	$("#show_tag").mouseover(function(){
	//	$("#tag_list").mouseover(function(){$(this).css('cursor','not-allowed ');});
		$("#tag_list").click(function(){$(this).remove();});
		});
	$("form:first").submit(function(){
		var tag_list = [];
		$("#show_tag").find("#tag_list").each(function(){
				tag_list.push($(this).text());
			});
		$("#tag_li").attr('value',tag_list);
		});
});

</script>
<form name="write" method="post" action="write.php?action=addlog">
<div class='write'>
<div class="write_left">
<ul>
	<li class="write_header"><b>写日志</b><{if $flag==0}> <span
		class="sort_state" id="write_state"> <img src="<{$path}>images/yes.png" />日志成功保存于：<{$savetime}></span>
	<{else if $flag==1}> <span class="sort_state" id="write_state"><img
		src="<{$path}>images/yes.png" />日志发布成功</span> <{else if $flag==2}> <span
		class="sort_state" id="write_state"><img src="<{$path}>images/no.png" />日志添加失败</span>
	<{/if}></li>
	<li>
	<hr />
	</li>
	<li><input type="text" name="post_name" id="post_name"
		class="post_name" value="请输入文章标题" onfocus="post_name_hide(this)"
		onblur="post_name_bk(this)" /></li>
	<li><script type='text/javascript' src='ckeditor/ckeditor.js'></script>
	<textarea cols='80' id='content' name='content' rows='10'></textarea> <script
		type='text/javascript'>
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
<div class="write_box"><input type="button" value="保存草稿"
	class="buttoncss" /><input type="submit" value="发布日志" class="buttoncss" id="save_log"/>
</div>
</div>
<div class="write_right">
<div>
<h3>分类目录</h3>
</div>
<div class="write_box"><{foreach key=key item=item from=$sort}>
<p><input type="radio" name="sort_name" value="<{$item['sort_id']}>" />&nbsp;<{$item['sort_name']}></p>
<{/foreach}></div>
</div>
<div class="write_right">
<div>
<h3>标签</h3>
</div>
<div class="write_box">
<input type="text" id="post_tag"class="write_input" style="width:90px;"/><input type="button" value="添加" class="buttoncss" id="add_tag"/>
<div id="show_tag"></div><input type="hidden" id="tag_li" name="tag_list"/>
<span class="write_pwd"><a href="#" id="ch_tag">选择已有标签</a></span>
<div id="tags" class="tags">
<{foreach key=key item=item from=$tagdata}>
<a href="#" id="<{$item['tag_id']}>" class="tag_list"><{$item['tag_name']}></a>
<{/foreach}>
</div>
</div>
</div>
</div>
</form>
