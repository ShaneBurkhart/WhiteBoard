<?php
	define("SERVER_ROOT", $_SERVER["DOCUMENT_ROOT"]);
	define("USER_SESSION_KEY", "USER_KEY");
	//Start session to get if user is logged in.
	/*session_start();
	//Check if is logged in
	if(isset($_SESSION[USER_SESSION_KEY]))
		$USER = $_SESSION[USER_SESSION_KEY];
	else
		$USER = 0;
	if($USER)
		//Go to boards
		include(SERVER_ROOT . "/index.html");
	else
		//Go to login
		include(SERVER_ROOT . "/login.html");*/
	include(SERVER_ROOT . "/index.html");
?>