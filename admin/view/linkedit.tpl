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
<form name="sort" method="post" action="link.php">
<div class='sort'>
<div class="sort_left">
<ul>
	<li class="sort_header"><b>链接</b></li>
	<li>
	<hr width=600px/>
	</li>
	<li>
	<div>
	<center>
	<{foreach key=key item=item from=$link_data}>
	<div class="sort_n">
	<p>链接名称:<input type="text" name="link_name" class="sort_input" value="<{$item['link_name']}>"/></p>
	<p>链接地址:<input type="text" name="link_url" class="sort_input" value="<{$item['link_url']}>"/></p>
	<p>链接描述:<input type="text" name="link_des" class="sort_input" value="<{$item['link_des']}>"/></p>
	<input type="submit" value="取消" class="buttoncss" /> <input type="button" value="确定" class="buttoncss"></div>
	<{/foreach}>
	</center>
	</div>
	</li>
</ul>
</div>
</div>
</form>
