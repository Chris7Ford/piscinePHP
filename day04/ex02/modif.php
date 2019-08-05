<?php

function modif_entry()
{
	$change_written = false;
	$existing = unserialize(file_get_contents('../htdocs/private/passwd'));
	if ($existing !== null)
	{
		$hash = hash("whirlpool", $_POST['oldpw']);
		foreach($existing as $k => $v)
		{
			if ($v['login'] === $_POST['login'] && $v['passwd'] === $hash)
			{
				$existing[$k]['passwd'] = hash("whirlpool", $_POST['newpw']);
				$change_written = true;
			}
		}
	}
	if (!$change_written)
	{
		echo "ERROR\n";
		return ;
	}
	file_put_contents("../htdocs/private/passwd", serialize($existing));
	echo "OK\n";
 }

if ($_POST['login'] && $_POST['newpw'] && $_POST['newpw'] != "" && $_POST['oldpw'] && $_POST['submit'] && $_POST['submit'] === 'OK')
	 modif_entry();
else
	echo "ERROR\n";
?>
