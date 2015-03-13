<script>
$(document).ready(function(){
	$("#save_com").click(function(){
		var name = $("#author").val();
		var email = $("#email").val();
		var url = $("#url").val();
		var com = $("#com").val();
		var id =$("#post_id").val();
		if(name==''||name==' '){
			alert("没有名字的同志不是好同志!!");
			$("#author").focus();
			}
		else if(email.match(/^(.+)@(.+)$/)==null){
			alert("填个能用的Email吧，我又不干坏事!");
			$("#email").focus();
			}
		else{
		    $.ajax({
				type: "POST",
				url: "index.php",
				data: "action=addcom&post_id="+id+"&name=" + name +"&email="+email+"&url="+url+"&com="+com,
				//dataType: "text",
				success: function(msg){
			    	document.location.reload();
			    //	alert(msg);
				   },
				error: function(request,error){
				    alert('Error deleting item(s), try again later.');
				  }
				});
			}
		});
});

</script>
<{foreach key=key item=item from=$postonly}>
<div class="post">
<p class="posts_title"><{$item['post_title']}></p>
<input type="hidden" id="post_id" value="<{$item['post_id']}>"/>
<span class="post_info"><{$item['post_date']}>|<{$item['post_views']}>次浏览|<{$item['post_author']}>发布</span>
<div class="post_content"><{$item['post_content']}></div>
<div class="post_sort">发布于:&nbsp; <a
	href="index.php?sort_id=<{$item['sort_id']}>"> <{$item['post_count']}></a>.
</div>
<div class="nbpost">
<div class="nb_left">
<--
<a href="index.php?post_id=<{$nb['prev']['1']}>" title="前一篇文章"><{$nb['prev']['0']}></a>
</div>
<div class="nb_right">
<a href="index.php?post_id=<{$nb['next']['1']}>" title="下一篇文章"><{$nb['next']['0']}></a>
-->
</div>
<div class="clear"></div>
</div>
</div>
<h3 id="comments" class="comments-number"><{$coms}> 条评论</h3>
<{/foreach}>
<div>
<ol class="commentlist">
<{foreach key=key item=item from=$comdata}>
<li class="comment odd alt thread-odd thread-alt depth-1" id="comment">
	<div id="div-comment" class="comment-body">
<div class="comment-author vcard"> 
<cite class="fn">
	<a href="http://<{$item['comment_url']}>" rel="external nofollow" class="url"><{$item['comment_poster']}></a>
</cite>
</div>
<div class="comment-meta commentmetadata">
	<a href="#"> <{$item['comment_date']}></a></div>
	<p><{$item['comment_content']}></p>
<div class="reply"> 
<a class="comment-reply-link" href="#" onclick="return addComment.moveForm(&quot;div-comment-48225&quot;, &quot;48225&quot;, &quot;respond&quot;, &quot;2837&quot;)">回复</a>
</div></div>
</li>
<{/foreach}>
</ol>
</div>
<div id="respond">
 <h3>发表你的看法</h3>
<div class="cancel-comment-reply"> 
 	<small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display: none; ">
 	点击这里取消回复。</a>
 	</small>
</div>
<form name="form_reply" method="post"  class="form_reply" id="commentform">
<p>
	<input type="text" name="author" id="author" value="" size="22" tabindex="1" aria-required="true"> 
	<label for="author">
		<small><strong>昵称</strong> （必须）</small>
	</label>
</p>
<p>
	<input type="text" name="email" id="email" value="" size="22" tabindex="2" aria-required="true"> 
	<label for="email">
		<small><strong>Email（不会被公开）</strong>（必须）</small>
	</label>
</p>
<p>
	<input type="text" name="url" id="url" value="" size="22" tabindex="3"> 
	<label for="url">
		<small><strong>网站</strong>（可选）</small>
	</label>
</p>
<p><textarea name="comment" id="com" cols="100%" rows="10" tabindex="4"></textarea></p>
<p>
	<input name="submit"  id="save_com" tabindex="5" value="发表" class="buttoncss">
</p>
</form>
</div>
</div>
