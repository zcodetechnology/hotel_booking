<?php 
	/**
	* 
	*/
	class Hotel{
		public $tableName = "my_hotels";
		public $roomtable = "rooms";
		public $notifications = "notification";
		public $cities_table = "cities";
		public function get() {
			$id = $_SESSION['user']['id'];
			global $db;
			$result = $db->get_query("SELECT * FROM " . $this->tableName ." WHERE user_id= ". $id);
			$my_hotels = array();
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$my_hotels[] = $row;
			}
			return $my_hotels;
		}
		public function getById($id) {
			return $db->get_value($tableName, "*", "id = '".$id."'");
		}
		public function add() {
			global $db;
			global $app;
			$name = $_POST['full_name'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$status = $_POST['status'];
			if($name == "") {
				$app->set_notify('danger', 'name-error');
			}
             else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
            	$app->set_notify('danger', 'invalid-name-error');
            }
			 else if($address == "") {
				$app->set_notify('danger', 'address-error');
			} else if($city == "") {
				$app->set_notify('danger', 'city-error');
			} else if($status == "") {
				$app->set_notify('danger', 'staus-error');
			} else {

				$result = $db->get_query("INSERT INTO ". $this->tableName." (user_id,name,address,city,status,created_at,updated_at) VALUES(' ". $_SESSION['user']['id'] ."','". $name ."','". $address ."','".$city."','".$status."', now(),now())");
				
				$result = $db->get_query("INSERT INTO ". $this->notifications." (to_user_id,from_user_id,type,message,created_at,updated_at) VALUES(' 1','". $_SESSION['user']['id'] ."','new-hotel','New hotel', now(),now())");
				return true;
			}
			return false;	
		}
              public function delete($id) {
              global $db;
		      $result =$db-> get_query("DELETE  FROM " .$this->tableName." WHERE id=".$id);
			  return $result;
		}
		public function approveHotel($id) {
  		global $db;
		$db-> get_query("UPDATE " .$this->tableName."  SET approve = 1 WHERE  id = ". $id);
		$x = $db-> get_query("select user_id from " .$this->tableName . " where id =". $id);
		$hotel = $x->fetch(PDO::FETCH_ASSOC);
	
		$db->get_query("INSERT INTO ". $this->notifications." (to_user_id,from_user_id,type,message,created_at,updated_at) VALUES( '".$hotel['user_id'] ."', '".$_SESSION['user']['id'] ."','approved-hotel','approved hotel', now(),now())");
		
	     }
           public function gethotelCount() {
				$id = $_SESSION['user']['id'];

				global $db;
				return $db->count_value($this->tableName, " WHERE user_id= ". $id);
			}
          public function getroomCount($id) {
				//	$id = $_POST['id'];
           //$id = $_SESSION['user']['id'];

				global $db;
			    
				 //$result=$db->get_query("SELECT id FROM " . $this->tableName);
				return $db->count_value($this->roomtable, " WHERE hotel_id=".$id);
			}


//user_id='".$_SESSION['user']['id']."' AND id = '".$hotel_id
		public function getCities(){
			
			global $db;
			$result = $db->get_query("SELECT * FROM " . $this->cities_table);
			$cities_table_data = array();
			 while($row = $result->fetch(PDO::FETCH_ASSOC))
				  {
				  
                   $cities_table_data[] = $row;

				  }
				  return $cities_table_data;
 
		}
	


}
?>





			
