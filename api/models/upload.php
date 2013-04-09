<?php

	class Upload_Model extends Model{

		private $folder = "_temp";
		private $basePath;
	
		public function __construct(){
			parent::__construct();
			$this->basePath = SERVER_ROOT . "/" . $this->folder;
		}

		public function createTemp($tempFname, $fname){
			$tempID = $this->addToDB($fname);
			if($tempID)
				//Save image temporarily
				move_uploaded_file($tempFname, $this->basePath . "/" . $tempID);
			//Return tempID
			return $tempID;
		}

		private function addToDB($fname){
			$query = "	INSERT INTO temp_files (filename)
						VALUES (?)";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("s", $fname);
			if($stmt->execute())
				$tempID = $this->db->insert_id;
			else
				$tempID = 0;
			if($stmt)
				$stmt->close();
			return $tempID;
		}

		public function isImage(){
			return false;
		}
	}
?>