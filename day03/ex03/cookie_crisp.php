<?php
if ($_GET["action"] == "set")
{
	if (isset($_GET['name']) && isset($_GET['value']))
		setcookie($_GET['name'], $_GET['value'], time() + 3600);
}
else if ($_GET['action'] == "get")
{
	if (isset($_COOKIE[$_GET['name']]))
		echo $_COOKIE[$_GET['name']]."\n";
}
else if ($_GET['action'] == "del")
{
	if (isset($_GET['name']))
		setcookie($_GET['name'], null, -1);
}
