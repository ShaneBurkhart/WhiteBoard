<?php

	class Board_Model extends Model{

		public function getBoards(){
			$query = "	SELECT *
						FROM boards
						ORDER BY id ASC";
			$stmt = $this->db->query($query);
			$p = array();
			while($row = $stmt->fetch_row())
				$p[] = array("id" => $row[0] , "name" => $row[1], "description" => $row[2], "date" => $row[3]);
			if($stmt)
				$stmt->close();
			return $p;
		}

		public function getBoard($id){
			$query = "	SELECT *
						FROM boards
						WHERE id = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->bind_result($id, $name, $desc, $date);
			if($stmt->fetch())
				$p = array("id" => $id , "name" => $name, "description" => $desc, "date" => $date);
			else
				$p = array();
			if($stmt)
				$stmt->close();
			return $p;
		}

		public function getJobsByUser($uid){
			$query = "	SELECT jobs.id , jobs.job_name
						FROM jobs
						INNER JOIN assignments 
						ON assignments.user_id = ?
						AND jobs.id = assignments.job_id";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $uid);
			$stmt->execute();
			$stmt->bind_result($id, $name);
			$p = array();
			while($stmt->fetch())
				$p[] = array("id" => $id, "name" => $name);
			if($stmt)
				$stmt->close();
			return $p;
		}

		public function create($name, $desc){
			if($this->getBoardID($name))
				return 0;
			$query = "	INSERT INTO boards(name, description) VALUES (?, ?)";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("ss", $name, $desc);
			if($stmt->execute())
				return $this->db->insert_id;
			else 
				return 0;
		}

		public function getBoardID($n){
			$query = "	SELECT id
						FROM boards
						WHERE name = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("s", $n);
			$stmt->execute();
			$stmt->bind_result($id);
			if($stmt->fetch())
				return $id;
			else
				return 0;
		}

		public function rename($jid, $name){
			$query = "	UPDATE jobs
						SET job_name = ? 
						WHERE id = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("si", $name, $jid);
			$r1 = $stmt->execute();
			$stmt->close();
			if($r1)
				$r2 = $this->addOneToAllVersions($jid);
			return $r1 and $r2;
		}

		public function addOneToAllVersions($jid){
			$query = "	UPDATE files
						SET version = version + 1 
						WHERE job_id = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $jid);
			$r1 = $stmt->execute();
			$stmt->close();
			return $r1;
		}

		public function delete($jid){
			$query = "	DELETE FROM jobs
						WHERE id = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $jid);
			$r1 = $stmt->execute();

			$query = "	DELETE FROM assignments
						WHERE job_id = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $jid);
			$r2 = $stmt->execute();

			//Delete files
			$query = "	SELECT id
						FROM files
						WHERE job_id = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $jid);
			$stmt->execute();
			$stmt->bind_result($id);
			while($stmt->fetch()){
				$f = SITE_ROOT . "/files/" + $id + ".pdf";
				while(file_exists($f))
					unlink($f);
			}

			$query = "	DELETE FROM files
						WHERE job_id = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $jid);
			$r3 = $stmt->execute();

			if($r1 and $r2 and $r3)
				return 1;
			else 
				return 0;
		}
	}
?>