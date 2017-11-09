<?php 
	/**
	* 
	*/
  class Room{
	public $room_table = "rooms";
	public $room_img = "rooms_images";
	public $my_hotel_table = "my_hotels";
    public $fa = "facility";
   	public $rfacilities = "room_facilities";
	public function addRoom() {
		global $db;
		global $app;
		$hotel_id = $_POST['hotel_id'];
		$name = $_POST['name'];
		$occupancy = $_POST['occupancy'];
		$floor = $_POST['floor'];
		$price = $_POST['price'];
		$discount = $_POST['discount'];
		$facilities = isset($_POST['facilities'])?$_POST['facilities']:[];
		if($name == "") {
			$app->set_notify('danger', 'name-error');
		} else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
        	$app->set_notify('danger', 'invalid-name-error');
        }
		 else if($occupancy == "") {
			$app->set_notify('danger', 'occupancy-error');
		} else if($floor == "") {
			$app->set_notify('danger', 'floor-error');
		} else if($price == "") {
			$app->set_notify('danger', 'price-error');
		} 
		 else if($price<0) {
			$app->set_notify('danger', 'price-negative-value-error');
		}
		 else if(!preg_match('/^[0-9]*$/', $price)) {
		    $app->set_notify('danger', 'number-error');
		}
		  else if($discount == "") {
			$app->set_notify('danger', 'discount-error');
		}
		 else if($discount<0) {
			$app->set_notify('danger', 'discount-negative-value-error');
		}
		 else if(!preg_match('/^[0-9]*$/', $discount)) {
		    $app->set_notify('danger', 'discount-number-error');
		}
		 else if($discount>$price) {
			$app->set_notify('danger', 'not-allowed-discount');
		}
		
		 else{
    		$hotel = $db->get_query("SELECT * from " . $this->my_hotel_table . " WHERE user_id='".$_SESSION['user']['id']."' AND id = '".$hotel_id."'" );

    	   if($hotel->rowCount() > 0) {
    		 $value = $hotel->fetch(PDO::FETCH_ASSOC);
    		   if($value['approve'] == 1) {
    				$roomid = $db->get_query_insert("INSERT INTO ". $this->room_table." (hotel_id,name,floor,occupancy,price,discount,created_at,updated_at) VALUES(' " . $hotel_id ."','".$name ."','".$floor."','".$occupancy."','".$price."','".$discount."', now(),now())");

                    $multiFilesName = $_FILES['multifiles']["name"];
             	   foreach($multiFilesName as $key => $values){
             		$mfileName = $_FILES["multifiles"]["name"][$key];
             		$mfileTempName = $_FILES["multifiles"]["tmp_name"][$key];
			             		
				    $new = mt_rand(1,999999);
				    $imgLoc = "images/". $new.$mfileName;
             		move_uploaded_file($mfileTempName, $imgLoc);
             		$file_path = PUBLIC_URL . "demo-exam/" . $imgLoc;
             	    $db->get_query("INSERT INTO rooms_images (room_id, image_id,created_at,updated_at) VALUES('".$roomid."', '".$file_path."',now(),now())");
		             }
	                  foreach ($facilities as $value) {
	                 	$db->get_query("INSERT INTO room_facilities (room_id, facility_id) VALUES($roomid, $value)");
	                  }
	                 global $notification;
	                 $notification->addNotification($_SESSION['user']['id'], 'new-room');
	                 return true;
	        			}
	        			else {
	        				$app->set_notify('danger', 'not-approved');
	        			 }
	        		   } 
        		else {
        			$app->set_notify('danger', 'not-your-hotel');
        		}
		
		  }
			return false;	
	 }
	     
	       
}
?>