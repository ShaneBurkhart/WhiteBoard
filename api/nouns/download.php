<?php
	class Download extends Noun {

		var $fileDir;
		
		function __construct(){
			$this->fileDir = SERVER_ROOT . "/" . "_files/"; 
		}

		function get(){
			if(isset($this->URIParts[3]) and is_numeric($this->URIParts[3]))
				$this->data["id"] = $this->URIParts[3];
			if(!$this->data["id"])
				die("No id");
			$attachmentModel = new Attachment_Model();
			$a = $attachmentModel->getAttachment($this->data["id"]);
			if(!$a)
				die("No attachment");
			$this->sendResponse($this->fileDir . $a["filename"]);
		}

		function sendResponse($fpath){
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="' . basename($fpath) . '"'); //<<< Note the " " surrounding the file name
			header('Content-Transfer-Encoding: binary');
			header('Connection: Keep-Alive');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($fpath));
		}

		function post(){
			die("Not a proper command");
		}

		function put(){
			die("Not a proper command");
		}

		function delete(){
			die("Not a proper command");
		}
	}
?>