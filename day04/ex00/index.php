<?php
session_start();
if ($_GET['submit'] && $_GET['submit'] == "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>
<html><body>
<form method="GET" action="index.php">
	Username: <input type="text" name="login" value="<?php if ($_SESSION['login']) echo $_SESSION['login']; else echo ""; ?>"/>
	<br />
	Password: <input type="password" name="passwd" value="<?php if ($_SESSION['passwd']) echo $_SESSION['passwd']; else echo ""; ?>"/>
	<br />
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>
