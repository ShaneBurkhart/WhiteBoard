<?php
	class Notifications extends Noun {
		
		function get(){
			$notificationsModel = new Notification_Model();
			$notifications = $notificationsModel->getNotifications();
			$this->sendJSON($notifications);
		}

		function post(){
			die("null");
		}

		function put(){
			die("null");
		}

		function delete(){
			die("null");
		}
	}
?>