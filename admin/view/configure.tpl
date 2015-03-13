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
	<li class="sort_header"><b>当前模板</b><{if $flag==0}> 
	<{else if $flag==1}> <span class="sort_state" id="sort_state"><img
		src="<{$path}>images/yes.png" />页面添加成功</span> <{else if $flag==2}> <span
		class="sort_state" id="sort_state"><img src="<{$path}>images/no.png" />页面已存在或者为空</span>
	<{/if}> <span class="sort_state" id="sort_succ" style="display: none;"><img
		src="<{$path}>images/no.png" />页面修改成功</span></li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<table class="sortbox">

			<tr >
      <td width="27%">
	  <img src="../view/templates/<{$tpl}>/preview.jpg" width="300" height="225"  border="0" />	  </td>
	  <td width="73%" align="left">
	   当前模板：<{$tpl}><br>
	  </td>	
			</tr>
	</table>
	</div>
	</li>
	<li>
	<div id="sss"></div>
	</li>
</ul>
</div>
<ul>
	<li class="sort_header"><b>模板列表</b></li>
	<li>
	<hr />
	</li>
	<li>
	<div>
	<p style="font-size:16px;margin-bottom:10px;">当前共有<{$tpln}>个模板</p>
	<table class="sortbox">
	<tr>
		<{foreach key=key item=item from=$tpls}>
			
			 <td align="center" width="300">
	           <a href="configure.php?action=usetpl&tpl=<{$item['tplfile']}>">
			  <img title="点击使用该模板" src="../view/templates/<{$item['tplfile']}>/preview.jpg" width="180" height="150" border="0" />
			  </a><br />
    		  <b><a href="configure.php?action=usetpl&tpl=<{$item['tplfile']}>" title="点击使用该模板"><{$item['tplname']}></a></b><br />
             </td>			
			
		<{/foreach}>
		</tr>

	</table>
	</div>
	</li>
	<li>
	<div id="sss"></div>
	</li>
</ul>
</div>
</form>
