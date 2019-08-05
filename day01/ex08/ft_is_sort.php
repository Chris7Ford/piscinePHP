<?php
function ft_is_sort($tab)
{
	$copy = $tab;
	sort($copy);
	foreach($copy as $k=>$v)
	{
		if ($v != $tab[$k])
			return (false);
	}
	return (true);
}
?>
