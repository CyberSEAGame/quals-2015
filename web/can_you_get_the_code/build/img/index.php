<?php
header('Content-type:image/png');
if(preg_match("/(MSIE|Trident)/", $_SERVER["HTTP_USER_AGENT"]))
{
	echo readfile("msie.png");
	exit();
}

// flag{ki6mpDIMzORxwGaPHIUt}
$id = str_replace("..", "", $_POST['id']);
echo readfile($id);
