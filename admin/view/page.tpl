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
	$("#addpage").click(function(){
		$(this).hide();
		$(".sortbox").hide();
		$("#editor").show();
		});
	$("#ensure").click(function(){
		var post_title=$("#post_title").val();
		var post_content=content.getData();
		$.ajax({
		   type: "POST",
		   url: "<{$url}>model.php",
		   data: {action:'addpage',title:post_title,content:post_content},
		   success: function(msg){
                alert("页面添加成功");
                document.location.reload();
		   }
		});
		});
	});

</script>
<form name="sort" method="post" action="">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="write_header"><b>添加页面</b>
</li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
			<tr>
				<th width="100px"><b>页面</b></th>
				<th><b>操作</b></th>
			</tr>
		</thead>
		<{foreach key=key item=item from=$pagedata}>
		<tbody>
			<tr class="sort_value">
				<td class="sort_name" width="260px"><{$item['page_title']}></td>
				<td id="del_sort" width="400px"><a
					href="javascript:_confirm('page','<{$item['page_id']}>')">删除</a></td>
				<td><input type="hidden" value="<{$item['page_id']}>" id="link_id"></td>
			</tr>
		</tbody>
		<{/foreach}>
	</table>
	</div>
	</li>
	<li>
	<div id="sss" style="margin-top:20px;">
	<input type="button" value="添加页面" class="buttoncss" id="addpage"/>
	<div style="display:none;" id="editor">
	<script type='text/javascript' src='ckeditor/ckeditor.js'></script>
	<label style="font-size:18px;background-color:#EEE;">标题</label>
	<br />
	<input type="text" name="post_name" id="post_title"
		class="post_name"  />
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
			</script>
		<input type="button" value="发布" class="buttoncss" id="ensure"/>	
			</div></div>
	</li>
</ul>
</div>
</div>
</form>
