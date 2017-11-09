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

				$result = $db->get_query_insert("INSERT INTO ". $this->tableName." (user_id,name,address,city,status,created_at,updated_at) VALUES(' ". $_SESSION['user']['id'] ."','". $name ."','". $address ."','".$city."','".$status."', now(),now())");
				
				
                    $fileName=$_FILES["cover_image"]["name"];
                    $fileTempName=$_FILES["cover_image"]["tmp_name"];
					$new = mt_rand(1,999999);
					$imgLocation = "img/hotel_cover_images/". $new.$fileName;
                    move_uploaded_file($fileTempName, $imgLocation);
                    $file_path = PUBLIC_URL. $imgLocation;




					$db->get_query("INSERT INTO hotels_images (hotel_id, images,type,created_at,updated_at) VALUES('".$result."', '".$file_path."', 'cover-image',now(),now())");
		             

               $multiFilesName = $_FILES['multifiles']["name"];
             	   foreach($multiFilesName as $key => $values){
             		$mfileName = $_FILES["multifiles"]["name"][$key];
             		$mfileTempName = $_FILES["multifiles"]["tmp_name"][$key];
			             		
				    $new = mt_rand(1,999999);
				    $imgLoc = "img/hotels_images/". $new.$mfileName;
             		move_uploaded_file($mfileTempName, $imgLoc);
             		$file_path = PUBLIC_URL. $imgLoc;
             	    $db->get_query("INSERT INTO hotels_images (hotel_id, images,type,created_at,updated_at) VALUES('".$result."', '".$file_path."', 'not-cover-image',now(),now())");
		             }

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


              public function search($valueToSearch){
            	global $db;
            		//$name = $_POST['full_name'];

                  $result =$db->get_query("SELECT h.* FROM `my_hotels` h, cities c WHERE (h.address LIKE '%$valueToSearch%' and h.city = c.id) or (h.city = c.id and c.city_name LIKE '%$valueToSearch%')") or die ("could not search");
                
               
                  //if ($result){
			                  $htl = array();
						while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
						{
							$htl[] = $row;
			            }
			            return $htl;
		            	     
        }  
            
        
		
		public function getImages($id) {
			global $db;
			$result = $db->get_query("select images from hotels_images where hotel_id='$id'");
			$img = array();
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
			{
				$img[] = $row;
            }
            return $img;
		}
		public function getCoverImages($id) {
			global $db;
			$result = $db->get_query("select images from hotels_images where hotel_id='$id'and type='cover-image'");
            return $result->fetch(PDO::FETCH_ASSOC);
		}


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





			
