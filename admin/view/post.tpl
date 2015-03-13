<?php
?>
<script>
function hide_state(){
$("#sort_state").fadeOut("slow");
}
setTimeout("hide_state()",3700);

$(document).ready(function(){
	$("#post_all").click(function(){
		CheckAll(this.form);
		});
	$(".post_value").mouseover(function(){
		$(this).css("background","#EEEEEE");});
	$(".post_value").mouseout(function(){
		$(this).css("background","white");});
	});
$(document).ready(function(){
	$(".sort_state").hide();
	$("#del").click(function(){del();});
	});

function changesort(obj){
	var selectedItems = new Array();
	var sort_id=obj.value;
	$("input[name='post_del[]']:checked").each(function() {selectedItems.push($(this).val());});
	if (selectedItems .length == 0)
	    alert("请选择要操作的文章.");
	else if(confirm("是否更改分类？")){
	    $.ajax({
		type: "POST",
		url: "<{$url}>model.php",
		data: "action=changesort&sort_id="+sort_id+"&change_id=" + selectedItems.join(','),
		//dataType: "text",
		success: function(msg){
	    	document.location.reload();
	    	//alert(msg);
		   },
		error: function(request,error){
		    alert('Error deleting item(s), try again later.');
		  }
		}
	    )
	}
}

function del(){
	var selectedItems = new Array();
	$("input[name='post_del[]']:checked").each(function() {selectedItems.push($(this).val());});
	
	if (selectedItems .length == 0)
	    alert("请选择要操作的文章.");
	else if(confirm("是否删除文章？")){
	    $.ajax({
		type: "POST",
		url: "<{$url}>model.php",
		data: "action=dellog&del_id=" + selectedItems.join(','),
		//dataType: "text",
		success: function(msg){
	    	document.location.reload();
	    	//alert(msg);
		   },
		error: function(request,error){
		    alert('Error deleting item(s), try again later.');
		  }
		}
	    )
	}
	
}

</script>
<form name="post" method="post" action="#">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="write_header"><b>日志更新</b> <span class="sort_state"
		id="update_state1"><img src="<{$path}>images/yes.png" />日志成功保存于：</span>
	<span class="sort_state" id="update_state2"><img
		src="<{$path}>images/yes.png" />日志删除成功</span> <span class="sort_state"
		id="update_state3"><img src="<{$path}>images/no.png" />日志删除失败</span></li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
			<tr>
				<th width="10px"><input type="checkbox" name="chkall" id="post_all" /></th>
				<th width="160px"><b>标题</b></th>
				<th width="40px"><b>查看</b></th>
				<th width="40px"><b>作者</b></th>
				<th width="40px"><b>分类</b></th>
				<th width="120px"><b>时间</b></th>
				<th width="40px"><b>阅读</b></th>
				<th width="40px"><b>评论</b></th>
			</tr>
		</thead>
		<tbody id="post_data">
			<{foreach key=key item=item from=$postdata}>
			<tr class="post_value">
				<td><input type="checkbox" name="post_del[]"
					value="<{$item['post_id']}>" class="check_css" /></td>
				<td class="post_title"><a
					href="<{$url}>write.php?action=edit&&post_id=<{$item['post_id']}>"><{$item['post_title']}></a></td>
				<td><a href="../?post_id=<{$item['post_id']}>" target="_blank"><img
					src="<{$path}>images/_blank.gif" class="blank" /></a></td>
				<td><a href="#"><{$item['post_author']}></a></td>
				<td><a href="post.php?action=list_by_sort&sort_id=<{$item['sort_id']}>"><{$item['post_count']}></a>
				</td>
				<td><{$item['post_date']}></td>
				<td><a href="#"><{$item['post_views']}></a></td>
				<td><a href="#"><{$item['post_comments']}></a></td>
			</tr>
			<{/foreach}>
		</tbody>
	</table>
	</div>
	</li>
</ul>

</form>
</div>
<div class="sort_right">
<div>
<h3>选中项</h3>
</div>
<div class="sort_n">
<div class="ui-state-default ui-corner-all li_w float_left" title="删除文章" id="del"><span class="ui-icon ui-icon-trash"></span></div>
&nbsp;
<div class="ui-state-default ui-corner-all li_w float_left" title="置顶"><span class="ui-icon ui-icon-pin-s"></span></div>
<select id="sort_change" class="sort_select" onChange="changesort(this);">
	<option selectd="selected">移动到分类.....</option>
	<{foreach  item=item from=$sortdata}> 
   <option value="<{$item['sort_id']}>"> <{$item['sort_name']}></option>
	<{/foreach}>
	
</select>
</div>
</div>
<div class="sort_right">
<div>
<h3>过滤</h3>
</div>
<div class="sort_n">
<p>分类：
	 <a href="post.php">All</a>
	<{foreach  item=item from=$sortdata}> 
 <a href="post.php?action=list_by_sort&sort_id=<{$item['sort_id']}>"><{$item['sort_name']}></a>
	<{/foreach}>

</p>
<br />
<p>
标签：
	<{foreach  item=item from=$tagdata}> 
    <a href="post.php?action=list_by_tag&tag_id=<{$item['tag_id']}>"><{$item['tag_name']}></a>
	<{/foreach}>

</p>
</div>
</div>
</div>

