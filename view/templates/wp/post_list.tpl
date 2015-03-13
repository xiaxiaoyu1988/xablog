<{foreach key=key item=item from=$postdata}>
<div class="post">
<p class="post_title"><a href="index.php?post_id=<{$item['post_id']}>" title="点我细细看"><{$item['post_title']}></a></p>
<span class="post_info"><{$item['post_date']}>|<{$item['post_views']}>次浏览|<{$item['post_comments']}>条评论|<{$item['post_author']}>发布</span>
<div class="post_content">
<{$item['post_content']}> 
</div>
<div class="post_sort">
<p>发布于:&nbsp;<a href="index.php?sort_id=<{$item['sort_id']}>" title="<{$item['post_count']}>目录"><{$item['post_count']}></a>.</p>
</div>
</div>
<{/foreach}>
</div>
