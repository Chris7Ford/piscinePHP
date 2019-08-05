if(decodeURIComponent(document.cookie.length > 5))
{
	setTimeout(() => {
	let parent_div = document.querySelector("#ft_list");
	$("#ft_list").html(decodeURIComponent(document.cookie.slice(5).trim()));
	}, 10);
}
$(document).ready(function(){
	$("button").click(function(){
		var content = prompt("New list item:");
		var copy = $("#ft_list").html();
		if (content.length > 0)
			$("#ft_list").html('<div class="list">' + content + "</div>" + copy);
		document.cookie = `list=${encodeURIComponent($("#ft_list").html())};expires=Fri, 5 Aug 2019 01:00:00 ATC;`;
	});
	$("body").on('click', '.list', function(){
		if (confirm("Delete list element " + $(this).text() + "?"))
			$(this).remove();
		document.cookie = `list=${encodeURIComponent($("#ft_list").html())};expires=Fri, 5 Aug 2019 01:00:00 ATC;`;
	});
});
