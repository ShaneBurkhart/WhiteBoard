<?php
	class Upload extends Noun {

		var $uploadModel;

		function __construct(){
			header('Content-type: text/html');
			$this->uploadModel = new Upload_Model();
		}

		function post(){
			$el = reset($_FILES);
			if($id = $this->uploadModel->createTemp($el["tmp_name"], $el["name"]))
				$this->sendResponse($id, $el["name"]);
		}

		function sendResponse($id, $fname){
			echo "	<script type=\"text/javascript\">
						(function($){
							$(\"#attachment-form\").prepend(\"<p class='attachment no-margin'>" . $fname . "</p><input type='hidden' value='" . $id . "'>\");
						})(window.parent.$);
					</script>";
		}
		
		function get(){
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