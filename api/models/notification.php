<?php

	class Notification_Model extends Model{

		public function getNotifications(){
			$query = "	SELECT notifications.id, notifications.date, notifications.board_id, notifications.contribution_id, boards.name
						FROM notifications
						INNER JOIN boards
						ON notifications.board_id = boards.id
						ORDER BY notifications.id ASC
						LIMIT 20";
			$stmt = $this->db->query($query);
			$n = array();
			while($row = $stmt->fetch_row())
				$n[] = array("id" => $row[0] , "date" => $row[1], "bid" => $row[2], "cid" => $row[3], "board_name" => $row[4]);
			if($stmt)
				$stmt->close();
			return $n;
		}

		public function getContributionsByBoardID($bid){
			$query = "	SELECT contributions.id, contributions.board_id, contributions.description, \"Shane\", contributions.date
						FROM contributions
						WHERE board_id = ?
						ORDER BY id DESC";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $bid);
			$stmt->execute();
			$stmt->bind_result($id, $bid, $desc, $user, $date);
			$p = array();
			while($stmt->fetch())
				$p[] = array("id" => $id , "bid" => $bid, "description" => $desc, "user" => $user, "date" => $date);
			if($stmt)
				$stmt->close();
			return $p;
		}

		public function getContribution($id){
			$query = "	SELECT contributions.id, contributions.board_id, contributions.description, \"Shane\", contributions.date
						FROM contributions
						WHERE id = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->bind_result($id, $bid, $desc, $user, $date);
			$p = array();
			if($stmt->fetch())
				$p = array("id" => $id , "bid" => $bid, "description" => $desc, "user" => $user, "date" => $date);
			else
				$p = array();
			if($stmt)
				$stmt->close();
			return $p;
		}

		public function create($bid, $cid){
			$query = "	INSERT INTO notifications(board_id, contribution_id)
						VALUES (?, ?)";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("ii", $bid, $cid);
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