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
	});

</script>
<form name="sort" method="post" action="link.php?action=addlink">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="sort_header"><b>链接</b><{if $flag==0}> <span
		class="sort_state" id="sort_state"> <img src="<{$path}>images/yes.png" />链接删除成功</span>
	<{else if $flag==1}> <span class="sort_state" id="sort_state"><img
		src="<{$path}>images/yes.png" />链接添加成功</span> <{else if $flag==2}> <span
		class="sort_state" id="sort_state"><img src="<{$path}>images/no.png" />链接已存在或者为空</span>
	<{/if}> <span class="sort_state" id="sort_succ" style="display: none;"><img
		src="<{$path}>images/no.png" />链接修改成功</span></li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">
		<thead class="sort_h">
			<tr>
				<th width="120px"><b>链接名称</b></th>
				<th width="400px"><b>描述</b></th>
				<th width="50px"><b>查看</b></th>
				<th><b>操作</b></th>
			</tr>
		</thead>

		<{foreach key=key item=item from=$linkdata}>
		<tbody>
			<tr class="sort_value">
				<td class="sort_name"><a href="link.php?action=link_edit&id=<{$item['link_id']}>"><{$item['link_name']}></a></td>
				<td><{$item['link_des']}></td>
				<td><a href="<{$item['link_url']}>" target="_blank"><img
					src="<{$path}>images/_blank.gif" class="blank" /></a></td>
				<td id="del_sort"><a
					href="javascript:_confirm('link','<{$item['link_id']}>')">删除</a></td>
				<td><input type="hidden" value="<{$item['link_id']}>" id="link_id"></td>
			<td>
			<div style="display:none" ">
				<p><input name="name" value="<{$item['link_name']}>"/></p>
				<p><input name="name" value="<{$item['link_des']}>"/></p>
				<p><input name="name" value="<{$item['link_url']}>"/></p>
				<p><input type="button" value="确定" class="buttoncss"/>
				<input type="button" value="取消" class="buttoncss" /></p> 
			</div></td>
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
<h3>添加链接</h3>
</div>
<div class="sort_n">
<p>链接名称<input type="text" name="link_name" class="sort_input" /></p>
<p>地址<input type="text" name="link_url" class="sort_input" /></p>
<p>描述<input type="text" name="link_des" class="sort_input" /></p>
<input type="submit" value="添加链接" class="buttoncss" /></div>
</div>
</div>
</form>
