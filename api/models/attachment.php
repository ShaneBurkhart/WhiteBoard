<?php

	class Attachment_Model extends Model{

		private $folder = "_files";
		private $basePath;
	
		public function __construct(){
			parent::__construct();
			$this->basePath = SERVER_ROOT . "/" . $this->folder;
		}

		public function getAttachment($id){
			$query = "	SELECT *
						FROM attachments
						WHERE id = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->bind_result($id, $cont_id, $filename);
			if($stmt->fetch())
				$a = array("id" => $id, "contribution_id" => $cont_id, "filename" => $filename);
			else
				$a = array();
			if($stmt)
				$stmt->close();
			return $a;
		}

		public function getAttachments($cid){
			$query = "	SELECT *
						FROM attachments
						WHERE contribution_id = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $cid);
			$stmt->execute();
			$stmt->bind_result($id, $cont_id, $filename);
			$a = array();
			while($stmt->fetch())
				$a[] = array("id" => $id, "contribution_id" => $cont_id, "filename" => $filename);
			if($stmt)
				$stmt->close();
			return $a;
		}

		public function saveAttachment($cid, $taid){
			if(!($tempAttach = $this->getTempAttachment($taid)))
				return;
			$f = SERVER_ROOT . "/_temp/" . $tempAttach["id"];
			if(!file_exists($f))
				return;
			//Add to attachment table
			if(!($attachID = $this->addToAttachments($cid, $tempAttach["filename"])))
				return;
			//Move file from _temp to _file
			rename($f, $this->basePath . "/" . $attachID);
			//Just a verification
			return $attachID;
		}

		private function addToAttachments($cid, $fname){
			$query = "	INSERT INTO attachments (contribution_id, filename)
						VALUES (?, ?)";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("is", $cid, $fname);
			if($stmt->execute())
				$attachId = $this->db->insert_id;
			else
				$attachId = 0;
			if($stmt)
				$stmt->close();
			return $attachId;
		}

		private function getTempAttachment($taid){
			$query = "	SELECT *
						FROM temp_files
						WHERE id = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $taid);
			$stmt->execute();
			$stmt->bind_result($tid, $filename);
			if($stmt->fetch())
				$temp = array("id" => $tid, "filename" => $filename);
			else
				$temp = 0;
			if($stmt)
				$stmt->close();
			return $temp;
		}

		public function isImage(){
			return false;
		}
	}
?>