// JavaScript Document
function menu_sub_hide(id) {
	if ($("#" + id).css('display') == "none") {
		$("#" + id).slideToggle("slow", function() {
			// $("#"+id).show("slow");
		});
	} else {
		$("#" + id).slideToggle("slow", function() {
			// $("#"+id).hide("slow");
		});
	}
}

function CheckAll(form) {
	for ( var i = 0; i < form.elements.length; i++) {
		var e = form.elements[i];
		if (e.name != 'chkall')
			e.checked = form.chkall.checked;
	}
}

function post_name_hide(post_name) {
	post_name.style.color = '#FF33FF';
	post_name.style.background = '#EEE';
	post_name.select();
}

function post_name_bk(post_name) {
	post_name.style.background = '#FFF';
}

function _confirm(name, value) {
	switch (name) {
	case 'sort':
		if (value == 0) {
			alert("默认分类无法删除");
			reurl = "sort.php";
			break;
		}
		var reurl = "sort.php?action=delsort&sort_id=" + value;
		msg = "是否要删除这个分类?";
		break;
	case 'tag':
		var reurl = "tag.php?action=deltag&tag_id=" + value;
		msg = "是否要删除这个标签?";
		break;
	case 'link':
		var reurl = "link.php?action=dellink&link_id=" + value;
		msg = "是否要删除这个链接?";
		break;
	case 'comm':
		var reurl = "comment.php?action=delcomm&comment_id=" + value;
		msg = "是否要删除这条评论?";
		break;
	case 'page':
		var reurl = "page.php?action=delpage&page_id="+value;
		msg = "是否要删除这个页面?"
		break;
	}
	if (confirm(msg)) {
		window.location = reurl;
	} else {
		return;
	}
}

function reloading() {
	document.location.reload();
}

function email_check() {

}
