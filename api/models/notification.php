<?php

	class Notification_Model extends Model{

		public function getNotifications(){
			$query = "	SELECT notifications.id, notifications.date, notifications.board_id, notifications.contribution_id, boards.name, notifications.user
						FROM notifications
						INNER JOIN boards
						ON notifications.board_id = boards.id
						ORDER BY notifications.id ASC
						LIMIT 20";
			$stmt = $this->db->query($query);
			$n = array();
			while($row = $stmt->fetch_row())
				$n[] = array("id" => $row[0] , "date" => $row[1], "bid" => $row[2], "cid" => $row[3], "board_name" => $row[4], "user" => $row[5]);
			if($stmt)
				$stmt->close();
			return $n;
		}

		public function create($bid, $cid, $user){
			$query = "	INSERT INTO notifications(board_id, contribution_id, user)
						VALUES (?, ?, ?)";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("iis", $bid, $cid, $user);
			if($stmt->execute())
				return $this->db->insert_id;
			else 
				return 0;
		}
	}
?>