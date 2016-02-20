<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Browser Check</title>
  <link rel="shortcut icon" href="favicon.ico">
</head>
<body>

<h1><?php

if(preg_match("/Netscape/", $_SERVER["HTTP_USER_AGENT"]))
{
	echo "flag{yVP3PTzWFGAxY2zSBfHJ}";
}
else
{
	echo "Your browser is not supported.";
}
?></h1>
</body>
</html>
