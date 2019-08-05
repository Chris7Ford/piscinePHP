<?php
//header('content-type: image/png');
if ($_SERVER['PHP_AUTH_USER'] !== 'zaz' && $_SERVER['PHP_AUTH_PW'] !== 'jaimelespetitsponeys')
{
	header("WWW-Authenticate: Basic realm=''Member area''");
	header("HTTP\ 1.0 401 Unauthorized");
	echo "<html><body>That area is accessible for members only</body></html>";
}
else
{
	$img = file_get_contents("../img/42.png");
	$encode = base64_encode($img);
	echo "<html><body>
Hello Zaz<br />
<img src=\"data:image/png;base64,".$encode."\">
</body></html>";
}
?>
