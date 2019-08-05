if(decodeURIComponent(document.cookie.length > 5))
{
	setTimeout(() => {
	let parent_div = document.querySelector("#ft_list");
	parent_div.innerHTML = decodeURIComponent(document.cookie.slice(5));
	}, 10);
}
const unshift_list = () =>
{
	let parent_div = document.querySelector("#ft_list");
	content = prompt("New list item:");
	let copy_parent = parent_div.innerHTML;
	if (content && content.length > 0)
	{
		parent_div.innerHTML = `<div onclick="del(this)">${content}</div>`;
		parent_div.innerHTML += copy_parent;
	}
	document.cookie = `list=${encodeURIComponent(parent_div.innerHTML)};expires=Fri, 5 Aug 2019 01:00:00 ATC;`;
}

const del = (elem) => 
{
	if (confirm("Delete list element " + elem.innerText + "?"))
		elem.parentNode.removeChild(elem);
	let parent_div = document.querySelector("#ft_list");
	document.cookie = `list=${encodeURI(parent_div.innerHTML)};expires=Fri, 5 Aug 2019 01:00:00 ATC;`;
}
