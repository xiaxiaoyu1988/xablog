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

	$("#cmhide").click(function(){
		    comment_id=$(this).parent().parent().find("#comment_id").val()
			$.ajax({
				   type: "POST",
				   url: "<{$url}>model.php",
				   data: {action:'updatecomm',comment_id:comment_id,stat:'1'},
				   success: function(msg){
					   $("#sort_succ").show();
				       document.location.reload();
				   }
				});
		});
	$("#cmret").click(function(){
	    comment_id=$(this).parent().parent().find("#comment_id").val()
		$.ajax({
			   type: "POST",
			   url: "<{$url}>model.php",
			   data: {action:'updatecomm',comment_id:comment_id,stat:'0'},
			   success: function(msg){
				   $("#sort_succ").show();
			       document.location.reload();
			   }
			});
		});
	});

</script>
<form name="sort" method="post" action="link.php?action=addlink">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="sort_header"><b>评论</b><{if $flag==0}> <span
		class="sort_state" id="sort_state"> <img src="<{$path}>images/yes.png" />评论删除成功</span>
	<{else if $flag==1}> <span class="sort_state" id="sort_state"><img
		src="<{$path}>images/yes.png" />评论添加成功</span> <{else if $flag==2}> <span
		class="sort_state" id="sort_state"><img src="<{$path}>images/no.png" />评论已存在或者为空</span>
	<{/if}> <span class="sort_state" id="sort_succ" style="display: none;"><img
		src="<{$path}>images/yes.png" />评论修改成功</span></li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
			<tr>
				<th width="60px"><b>评论人</b></th>
				<th width="300px"><b>内容</b></th>
				<th width="50px"><b>Email</b></th>
				<th><b>操作</b></th>
			</tr>
		</thead>

		<{foreach key=key item=item from=$commentdata}>
		<tbody>
			<tr class="sort_value">
				<td class="sort_name">
				<a href="http://<{$item['comment_url']}>" target="_blank"><{$item['comment_poster']}></a></td>
				<td><{$item['comment_content']}></td>
				<td><a href="mailto:<{$item['comment_email']}>"><{$item['comment_email']}></a></td>
				<td id="del_sort"><a
					href="javascript:_confirm('comm','<{$item['comment_id']}>')">删除</a>&nbsp;
					<{if $item['comment_hide']==0}>
					<a href="#" id="cmhide">屏蔽</a>
					<{else}>
					<a href="#" id="cmret">恢复</a>
					<{/if}>
				</td>
				<td><input type="hidden" value="<{$item['comment_id']}>" id="comment_id"></td>
			</tr>
		</tbody>
		<{/foreach}>

	</table>
	</div>
	</li>
	<li>
	<div id="sss"></div>
	</li>
</ul>
</div>
<div class="sort_right">
<div>
<h3>评论</h3>
</div>
<div class="sort_n">
<p>demo<input type="text" name="link_name" class="sort_input" /></p>
<p>demo<input type="text" name="link_url" class="sort_input" /></p>
<p>demo<input type="text" name="link_des" class="sort_input" /></p>
<input type="submit" value="demo" class="buttoncss" /></div>
</div>
</div>
</form>
