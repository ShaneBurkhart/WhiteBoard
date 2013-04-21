<?php
	class Login extends Noun {

		var $isLoggedIn;
		var $userCreds;

		function __construct(){
			session_start();
			$isLoggedIn = isset($_SESSION[USER_SESSION_KEY]);
			if($isLoggedIn)
				$userCreds = $_SESSION[USER_SESSION_KEY];
		}

		function get(){
			die("Nothing");
		}

		function post(){
			if(!isset($_POST["password"]) or !isset($_POST["email"]))
				die("No creds");
			$_SESSION[USER_SESSION_KEY] = 1;
			header("Location: /");
		}

		function put(){
			die("Nothing");
		}

		function delete(){
			die("Nothing");
		}
	}
?>