<?php 
    class Notification{
			public $notifications = "notification";

			public function addNotification($to_user_id, $type, $from_user_id = 0){

				$message = "";
				global $db;
				if($type == "new-room") {
					$message = "You have created new room";
				} else if($type == "new-hotel") {
					$message = "You have new request to approve hotel";
				} else if($type == "hotel-approved") {
					$message = "Your hotel has been approved by admin";
				} else {
					$message = "System message";
				}

		      $result = $db->get_query("INSERT INTO ". $this->notifications." (to_user_id,from_user_id,type,message,created_at,updated_at) VALUES('$to_user_id','$from_user_id','$type','$message', now(),now())");
				 return true;
			}
			public function getNotification() {
				global $db;
				$result = $db->get_query("SELECT * FROM " .$this->notifications." WHERE 	to_user_id=".$_SESSION['user']['id']);
				$my_notifications = array();
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$my_notifications[] = $row;
				}
				return $my_notifications;

			}

			public function getUnReadCount() {
				$id = $_SESSION['user']['id'];

				global $db;
				return $db->count_value($this->notifications, " WHERE to_user_id='$id' AND is_read=0");
			}

			public function markAsRead() {
				global $db;
				$id = $_SESSION['user']['id'];
				$db->get_query("UPDATE ". $this->notifications. " SET is_read=1 WHERE to_user_id='$id'");
			}



			
			/*public function snotification() {
				global $db;
				$result = $db->get_query("SELECT * FROM " . $this->notifications ." WHERE 	to_user_id=".$_SESSION['user']['id']);
				$my_hotels = array();
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$my_hotels[] = $row;
				}
				return $my_hotels;
			}
					
*/
}
?>