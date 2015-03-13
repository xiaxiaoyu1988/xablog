<script>
function hide_state(){
	$("#sort_state").fadeOut("slow");
	}
	setTimeout("hide_state()",3700);
	$(document).ready(function(){
		$(".sort_value").mouseover(function(){
			$(this).css("background","#EEEEEE");});
		$(".sort_value").mouseout(function(){
			$(this).css("background","white");});

		$(".sort_name").click(function(){
			if($(this).find(".sort_input_edit").attr("type") == "text"){return false;}
			var name = $.trim($(this).html());
			var m = $.trim($(this).text());
			//$(this).html("<input type=text value="+name+" class=sort_input_edit /> <input type='button' value='确定' class='buttoncss2' width='5px'><input type='button' value='取消' class='buttoncss2' width='5px'>");
			$(this).html("<input type=text value="+name+" class=sort_input_edit>");
			$(this).find(".sort_input_edit").focus();
			$(this).find(".sort_input_edit").bind("blur", function(){
				var n = $.trim($(this).val());
				var tag_id=$.trim($(this).parent().parent().find("#tag_id").val());
				if(n!=m&&n!=''){			
				    $.ajax({
						type: "POST",
						url: "<{$url}>model.php",
						data: "action=update_tag&tag_id=" + tag_id +"&tag_name="+n,
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
</script>
<form name="tag" method="post" action="tag.php?action=addtag">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="sort_header"><b>标签</b><{$result}> <{if $flag==0}> <span
		class="sort_state" id="sort_state"> <img src="<{$path}>images/yes.png" />标签删除成功</span>
	<{else if $flag==1}> <span class="sort_state" id="sort_state"><img src="<{$path}>images/yes.png" />标签添加成功</span>
	<{else if $flag==2}> <span class="sort_state" id="sort_state"><img src="<{$path}>images/no.png" />标签名重复或者为空</span>
	<{/if}>
		<span
		class="sort_state" id="sort_succ" style="display:none;"><img src="<{$path}>images/yes.png" />标签修改成功</span>
	</li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
		<tr>
			<td width="100px"><b>标签名称</b></td>
			<td width="380px"><b>描述</b></td>
			<td><b>操作</b></td>
		</tr>
		</thead>
		<tbody>
			<{foreach key=key item=item from=$tagdata}>
			<tr class="sort_value">
				<td class="sort_name"><{$item['tag_name']}></td>
				<td><{$item['tag_des']}></td>
				<td id="del_sort"><a
					href="javascript:_confirm('tag','<{$item['tag_id']}>')">删除</a></td>
				<td><input type="hidden" value="<{$item['tag_id']}>" id="tag_id"></td>
			</tr>
			<{/foreach}>
		</tbody>
	</table>
	</div>
	</li>
</ul>
</div>
<div class="sort_right">
<div>
<h3>添加标签</h3>
</div>
<div class="sort_n">
<p>标签名称<input type="text" name="tag_name" class="sort_input" /></p>
<p>描述<input type="text" name="tag_des" class="sort_input" /></p>
<input type="submit" value="添加标签" class="buttoncss" /></div>
</div>
</div>
</form>
