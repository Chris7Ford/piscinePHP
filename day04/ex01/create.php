<?php

function add_entry()
{

	if (!file_exists("../htdocs"))
		mkdir("../htdocs");
	if (!file_exists("../htdocs/private"))
		mkdir("../htdocs/private");
	if (!file_exists("../htdocs/private/passwd"))
		file_put_contents("../htdocs/private/passwd", null);
	$existing = unserialize(file_get_contents('../htdocs/private/passwd'));
	if ($existing == false)
		$existing = [];
	if ($existing !== null)
	{
		foreach($existing as $k => $v)
		{
			if ($v['login'] === $_POST['login'])
			{
				echo "ERROR\n";
				return ;
			}
		}
	}
	$details = array (
		"login" => $_POST["login"],
		"passwd" => hash("whirlpool", $_POST["passwd"])
	);
	array_push($existing, $details);
	file_put_contents("../htdocs/private/passwd", serialize($existing));
	echo "OK\n";
}

if ($_POST['passwd'] != "" && $_POST['submit'] === 'OK')
	add_entry();
else
	echo "ERROR\n";
?>
