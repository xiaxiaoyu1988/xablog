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
	$(".n").mouseover(function(){
		$(this).attr('title', '未激活');
		});
	$(".y").mouseover(function(){
		$(this).attr('title', '已激活');
		});
	$(".n").click(function(){
		var name = $(this).parent().parent().parent().find(".sort_name").text();
		key = name +'/' +name + '.php';
	    $.ajax({
			type: "POST",
			url: "model.php",
			data: "action=plugin&stat=1&key=" +key,
			//dataType: "text",
			success: function(msg){
		    	document.location.reload();
			   },
			error: function(request,error){
			    alert('Error deleting item(s), try again later.');
			  }
			});
		});
	$(".y").click(function(){
		var name = $(this).parent().parent().parent().find(".sort_name").text();
		key = name +'/' +name + '.php';
	    $.ajax({
			type: "POST",
			url: "model.php",
			data: "action=plugin&stat=0&key=" +key,
			//dataType: "text",
			success: function(msg){
		    	document.location.reload();
			   },
			error: function(request,error){
			    alert('Error deleting item(s), try again later.');
			  }
			});
		});
	});

</script>
<form name="sort" method="post" action="link.php?action=addlink">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="sort_header"><b>插件管理</b><{if $flag==0}> 
	<{else if $flag==1}> <span class="sort_state" id="sort_state"><img
		src="<{$path}>images/yes.png" />插件添加成功</span> <{else if $flag==2}> <span
		class="sort_state" id="sort_state"><img src="<{$path}>images/no.png" />插件已存在或者为空</span>
	<{/if}> <span class="sort_state" id="sort_succ" style="display: none;"><img
		src="<{$path}>images/no.png" />插件修改成功</span></li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
			<tr>
				<th width="100px"><b>插件名称</b></th>
				<th width="40px"><b>状态</b></th>
				<th width="50px"><b>版本</b></th>
				<th>描述</th>
			</tr>
		</thead>

		<{foreach key=key item=item from=$plugins}>
		<tbody>
			<tr class="sort_value">
				<td class="sort_name"><{$item['Name']}></td>
				<td><a href="#" ><img src="<{$path}>images/<{$item['Url']}>.gif" class="<{$item['Url']}>"/></a></td>
				<td><{$item['Version']}></td>
				<td id="del_sort"><p style="font-size:10px;text-align:left;"><{$item['Description']}></p>
							<p style="font-size:10px;text-align:left;">作者:<a href="mailto:<{$item['Email']}>"><{$item['Author']}></a>
							<a href="<{$item['AuthorUrl']}>" target="_blank">作者主页</a></p></td>
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
<h3>插件</h3>
</div>
<div class="sort_n">
<p>demo<input type="text" name="link_name" class="sort_input" /></p>
<p>demo<input type="text" name="link_url" class="sort_input" /></p>
<p>demo<input type="text" name="link_des" class="sort_input" /></p>
<input type="submit" value="添加链接" class="buttoncss" /></div>
</div>
</div>
</form>
