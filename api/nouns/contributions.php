<?php
	class Contributions extends Noun {
		
		function get(){
			$contributionModel = new Contribution_Model();
			//get vars from URI
			if(isset($this->URIParts[3]) and is_numeric($this->URIParts[3]))
				$this->data["id"] = $this->URIParts[3];
			if(!isset($this->data["id"]))								//Display All contributions
				$this->sendJSON($contributionModel->getContributions());
			else 														//Display contibution by id
				$this->sendJSON($contributionModel->getContributionByBoardID($this->data["id"]));
			
		}

		function post(){
			$contributionModel = new Contribution_Model();
			if(!isset($this->data["bid"]) or !isset($this->data["description"]))//Add user later
				die("No creds"); // send response
			
			$id = $contributionModel->create($this->data["bid"], $this->data["description"], 1);// User id
			$this->sendJSON($contributionModel->getContribution($id));
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