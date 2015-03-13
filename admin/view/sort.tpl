<script>
function hide_state(){
$("#sort_state").fadeOut("slow");
}
setTimeout("hide_state()",3700)

$(document).ready(function(){
	$(".sort_name").click(function(){
		if($(this).find(".sort_input_edit").attr("type") == "text"){return false;}
		var name = $.trim($(this).html());
		var m = $.trim($(this).text());
		//$(this).html("<input type=text value="+name+" class=sort_input_edit /> <input type='button' value='确定' class='buttoncss2' width='5px'><input type='button' value='取消' class='buttoncss2' width='5px'>");
		$(this).html("<input type=text value="+name+" class=sort_input_edit>");
		$(this).find(".sort_input_edit").focus();
		$(this).find(".sort_input_edit").bind("blur", function(){
			var n = $.trim($(this).val());
			var sort_id=$.trim($(this).parent().parent().find("#sort_id").val());
			if(n!=m&&n!=''){			
			    $.ajax({
					type: "POST",
					url: "<{$url}>model.php",
					data: "action=update_sort&sort_id=" + sort_id +"&sort_name="+n,
					//dataType: "text",
					success: function(msg){
					  	$("#sort_succ").show("slow");
					  	setTimeout("reloading()",1000);		    	
				    	//alert(msg);
					   },
					error: function(request,error){
					    alert('Error deleting item(s), try again later.');
					  }
					}
				    )
				}else{
			$(this).parent().html(name);}
			});
		});

	});
$(document).ready(function(){
	$(".sort_value").mouseover(function(){
		$(this).css("background","#EEEEEE");});
	$(".sort_value").mouseout(function(){
		$(this).css("background","white");});
	});

</script>
<form name="sort" method="post" action="sort.php?action=addsort">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="sort_header"><b>分类</b><{if $flag==0}> <span
		class="sort_state" id="sort_state"> <img src="<{$path}>images/yes.png" />分类删除成功</span>
	<{else if $flag==1}> <span class="sort_state" id="sort_state"><img
		src="<{$path}>images/yes.png" />分类添加成功</span> <{else if $flag==2}> <span
		class="sort_state" id="sort_state"><img src="<{$path}>images/no.png" />分类已存在或者为空</span>
	<{/if}>
	<span
		class="sort_state" id="sort_succ" style="display:none;"><img src="<{$path}>images/no.png" />分类修改成功</span>
	</li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
			<tr>
				<th width="120px"><b>分类名称</b></th>
				<th width="400px"><b>描述</b></th>
				<th width="50px"><b>日志数</b></th>
				<th><b>操作</b></th>
			</tr>
		</thead>
		
			<{foreach key=key item=item from=$sort}>
			<tbody>
			<tr class="sort_value">
				<td class="sort_name"><{$item['sort_name']}></td>
				<td><{$item['sort_des']}></td>
				<td><a href="post.php?action=list_by_sort&sort_id=<{$item['sort_id']}>"><{$item['post_num']}></a></td>
				<td id="del_sort"><a
					href="javascript:_confirm('sort','<{$item['sort_id']}>')">删除</a></td>
				<td><input type="hidden" value="<{$item['sort_id']}>" id="sort_id"></td>
			</tr>
			</tbody>
			<{/foreach}>
		
	</table>
	</div>
	</li>
</ul>
</div>
<div class="sort_right">
<div>
<h3>添加分类</h3>
</div>
<div class="sort_n">
<p>分类名称<input type="text" name="sort_name" class="sort_input" /></p>
<p>描述<input type="text" name="sort_des" class="sort_input" /></p>
<input type="submit" value="添加分类" class="buttoncss" /></div>
</div>
</div>
</form>
