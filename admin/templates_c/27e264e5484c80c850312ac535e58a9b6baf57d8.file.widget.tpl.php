<?php /* Smarty version Smarty3rc4, created on 2011-06-06 15:24:41
         compiled from "C:\xampp\htdocs\xablog/admin/view/widget.tpl" */ ?>
<?php /*%%SmartyHeaderCode:296094decf139107d44-49168812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27e264e5484c80c850312ac535e58a9b6baf57d8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xablog/admin/view/widget.tpl',
      1 => 1307373765,
    ),
  ),
  'nocache_hash' => '296094decf139107d44-49168812',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
$(document).ready(function(){
	var widgets=[];
	 $("#w_list").find(".model").each(function(){
		 widgets.push(this.id);
			});
		//alert(widgets);
	 for(i=0;i<widgets.length;i++){
		 //alert(widgets[i]);
		$("."+widgets[i]).find(".w_add").hide();
		$("."+widgets[i]).find(".w_del").show();
		 }
	$("#diy_add").click(function(){
		menu_sub_hide('diy_box');
		});
	$("#add_w").click(function(){
		var	name=$("#w_diy_name").val();
		$(".w_diy").append("<div class='example'><div class='w_title'><li><h5>"+name+"</h5></li><input type=\"hidden\" value=\""+name+"\" id=\"hv\"/></div><div class='control'><li class='w_add'><span class='ui-icon ui-icon-plusthick'></span></li><li class='w_del'><span class='ui-icon ui-icon-minusthick'></span></li></div></div>");

		var str=$(".w_diy").html();
		var content=$("#w_diy_con").val(); 
		$.ajax({
			type: "POST",
			url: "<?php echo $_smarty_tpl->getVariable('url')->value;?>
model.php",
			data: "action=update_diy&str="+str+"&content="+content+"&name="+name,
			//dataType: "text",
			success: function(msg){
//			  	$("#sort_succ").show("slow");
//			  	setTimeout("reloading()",1000);	
		    	$("#show").html("<span class=\"sort_state\" id=\"state\"><img src=\"<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png\" />添加成功</span> ");
		    	setTimeout('$("#state").hide()',3700);
		    	document.location.reload();
			   },
			error: function(request,error){
			    alert('Error deleting item(s), try again later.');
			  }
			});
		});
	$(".w_title").click(function(){
		if($(this).parent().find('#w_content').css('display')=='none'){
			$(this).parent().find('#w_content').fadeIn("slow");}
		else{
				$(this).parent().find('#w_content').fadeOut("slow");
				}
		
		});
	$("#w_save").click(function(){
		//var str=$("#w_list").html();
		var list=[];
		$("#w_list").find(".model").each(function(){
			list.push(this.id+'/'+$(this).find("h5").text());
			});
		var str = list.join(',');
	    $.ajax({
			type: "POST",
			url: "<?php echo $_smarty_tpl->getVariable('url')->value;?>
model.php",
			data: "action=update_w&str="+str,
			//dataType: "text",
			success: function(msg){
//			  	$("#sort_succ").show("slow");
//			  	setTimeout("reloading()",1000);		    	
//		    	alert(msg);
		    	$("#show").html("<span class=\"sort_state\" id=\"state\"><img src=\"<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png\" />更新成功</span> ");
		    	setTimeout('$("#state").hide()',3700);
				   },
			error: function(request,error){
			    alert('Error deleting item(s), try again later.');
			  }
			}
		    );
		});
	$(".w_add").click(function(){
		var id=$(this).parent().parent().find('#hv').val();
		var name=$(this).parent().parent().find('h5').text();
		$("#w_list").append("<li class=\"model\" id="+id+"><h5>"+name+"</h5></li>");
		$(this).hide();
		$(this).parent().find(".w_del").show();
		});
	$(".w_del").click(function(){
		var id=$(this).parent().parent().find('#hv').val();
		var name=$(this).parent().parent().find('h5').text();
		$("#w_list").find("#"+id).remove();
		$(this).hide();
		$(this).parent().find(".w_add").show();
		});
	$("#w_list").mouseover(function(){
		$("#w_list").Sortable({
			accept: 'model'
		});
		
        });
    $(".w_title").click(function(){
		if(confirm("是否删除？")){
			$(this).parent().remove();
			var str=$(".w_diy").html();
			var content=$("#w_diy_con").val(); 
			var name=$(this).find("h5").text();
			$.ajax({
				type: "POST",
				url: "<?php echo $_smarty_tpl->getVariable('url')->value;?>
model.php",
				data: "action=update_diy&str="+str+"&name="+name+"&del=del",
				//dataType: "text",
				success: function(msg){
//				  	$("#sort_succ").show("slow");
//				  	setTimeout("reloading()",1000);		    	
			    	$("#show").html("<span class=\"sort_state\" id=\"state\"><img src=\"<?php echo $_smarty_tpl->getVariable('path')->value;?>
images/yes.png\" />添加成功</span> ");
			    	setTimeout('$("#state").hide()',3700);
				   },
				error: function(request,error){
				    alert('Error deleting item(s), try again later.');
				  }
				});
			}
        });
});
</script>
<div class="widget">
<div id="show" style="margin-bottom:-20px;margin-top:-20px;"></div>
	<div class="w_head">
		<b>小工具</b>
		<hr width="600px"/>
	</div>
	
	<div class="widget_use">
	<div class="widget_left">
		<div class="calendar" title="calendar">
			<div class="w_title">
				<li><h5>日历</h5></li>
				<input type="hidden" value="calendar" id="hv"/>
			</div>
			<div class="control">
				<li class="w_add"><span class="ui-icon ui-icon-plusthick"></span></li>
				<li class="w_del"><span class="ui-icon ui-icon-minusthick"></span></li>
			</div>
		</div>
		
		<div class="bloger">
			<div class="w_title">
				<li><h5>bloger</h5></li>
				<input type="hidden" value="bloger" id="hv"/>
			</div>
			<div class="control">
			<li class="w_add"><span class="ui-icon ui-icon-plusthick"></span></li>
				<li class="w_del"><span class="ui-icon ui-icon-minusthick"></span></li>
			</div>
		</div>
		
		<div class="w_tag">
			<div class="w_title">
				<li><h5>标签</h5></li>
				<input type="hidden" value="w_tag" id="hv"/>
			</div>
			<div class="control">
			<li class="w_add"><span class="ui-icon ui-icon-plusthick"></span></li>
				<li class="w_del"><span class="ui-icon ui-icon-minusthick"></span></li>
			</div>
		</div>
		
		<div class="w_sort">
			<div class="w_title">
				<li><h5>分类</h5></li>
				<input type="hidden" value="w_sort" id="hv"/>
			</div>
			<div class="control">
			<li class="w_add"><span class="ui-icon ui-icon-plusthick"></span></li>
				<li class="w_del"><span class="ui-icon ui-icon-minusthick"></span></li>
			</div>
		</div>
		</div>
		<div class="widget_right">
		<div class="w_npost">
			<div class="w_title">
				<li><h5>最新日志</h5></li>
				<input type="hidden" value="w_npost" id="hv"/>
			</div>
			<div class="control">
			<li class="w_add"><span class="ui-icon ui-icon-plusthick"></span></li>
				<li class="w_del"><span class="ui-icon ui-icon-minusthick"></span></li>
			</div>
		</div>
		<div class="w_ncom">
			<div class="w_title">
				<li><h5>最新评论</h5></li>
				<input type="hidden" value="w_ncom" id="hv"/>
			</div>
			<div class="control">
			<li class="w_add"><span class="ui-icon ui-icon-plusthick"></span></li>
			<li class="w_del"><span class="ui-icon ui-icon-minusthick"></span></li>
			</div>
		</div>
		<div class="w_link">
			<div class="w_title">
				<li><h5>链接</h5></li>
				<input type="hidden" value="w_link" id="hv"/>
			</div>
			<div class="control">
			<li class="w_add"><span class="ui-icon ui-icon-plusthick"></span></li>
				<li class="w_del"><span class="ui-icon ui-icon-minusthick"></span></li>
			</div>
		</div>
		<div class="example">
			<div class="w_title">
				<li><h5>RSS订阅</h5></li>
				<input type="hidden" value="rss" id="hv"/>
			</div>
			<div class="control">
			<li class="w_add"><span class="ui-icon ui-icon-plusthick"></span></li>
				<li class="w_del"><span class="ui-icon ui-icon-minusthick"></span></li>
			</div>
			<div class="w_content" id="w_content">
			<textarea id="ex_text"></textarea>
			</div>
		</div>
	</div>
	</div>

	<div class="widget_diy">
	<div class="diy">
	<a href="#" id="diy_add">自定义小工具&raquo;</a>
	<div class="diy_box" id="diy_box">
		<p>小工具名</p>
		<p><input type="text" id="w_diy_name" class="inpuctss"/></p>
		<p>内容</p>
		<p><textarea id="w_diy_con" style="width:320px;overflow:auto;" rows="10"></textarea></p>
		<p><input type="button" value="添加小工具" class="buttoncss" style="margin-top:2px;" id="add_w"/></p>
	</div>
	</div>
	<div class="w_diy">
		<?php echo $_smarty_tpl->getVariable('diy_list')->value;?>

	</div>
	</div>
</div>

	<div class="widget_using">
	<div id="w_list">
		<ul>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('w_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<li class="model" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['0'];?>
">
		<h5><?php echo $_smarty_tpl->tpl_vars['item']->value['1'];?>
</h5>
		</li>		
	<?php }} ?>
		</ul>
		</div>
		<div class="w_act">
		<p><input type="button" value="保存" id="w_save" class="buttoncss"/></p>
		</div>
	</div>
