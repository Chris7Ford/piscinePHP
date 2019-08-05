<?php

function auth($login, $passwd)
{
	$existing = unserialize(file_get_contents('../htdocs/private/passwd'));
	if ($existing !== null)
	{
		$hash = hash("whirlpool", $passwd);
		foreach($existing as $k => $v)
		{
			if ($v['login'] === $login && $v['passwd'] === $hash)
				return (true);
		}
	}
	return (false);
}
?>
