<?php
	class Boards extends Noun {
		
		function get(){
			$boardModel = new Board_Model();
			//get vars from URI
			if(isset($this->URIParts[3]) and is_numeric($this->URIParts[3]))
				$this->data["id"] = $this->URIParts[3];
			if(!isset($this->data["id"]))								//Display All Jobs
				$this->sendJSON($boardModel->getBoards());
			else 														//Display board by id
				$this->sendJSON($boardModel->getBoard($this->data["id"]));
		}

		function post(){
			$boardModel = new Board_Model();
			if(!isset($this->data["name"]) or !isset($this->data["description"]))
				die("No creds"); // send response
			
			if(!($id = $boardModel->create($this->data["name"], $this->data["description"])))
				$id = $boardModel->getBoardID($this->data["name"]);
			$this->sendJSON($boardModel->getBoard($id));
		}

		function put(){
			$jobModel = new Job_Model();
			if(!isset($this->data["id"]) or !isset($this->data["name"]))
				;//send failed response
			$jobModel->rename($this->data["id"], $this->data["name"]);
			$this->sendJSON($jobModel->getJobs());
		}

		function delete(){
			$jobModel = new Job_Model();
			//Get the id from uri
			if(count($this->URIParts) >= 4 and is_numeric($this->URIParts[3]))
				$id = $this->URIParts[3];
			else
				exit;
			$jobModel->delete($id);
			$this->sendJSON($jobModel->getJobs());	
		}
	}
?>