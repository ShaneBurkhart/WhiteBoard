<?php

	class User_Model extends Model{

		public function getUserID($name){
			$query = "	SELECT id
						FROM users
						WHERE name = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("s", $name);
			$stmt->execute();
			$stmt->bind_result($id);
			$stmt->fetch();
			if($stmt)
				$stmt->close();
			return $id;
		}

	}
?>