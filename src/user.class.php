<?php 
class User {
	public $users = "user";
	public $hotel_find = "my_hotels";
	public $h_images="hotel_images";
	public function signUp() {
		global $db;
		global $app;
		$firstname=$_POST["firstName"];
	    $lastname=$_POST["lastName"];
	    $email=$_POST["email"];
	    $pwd=$_POST["password"];
	    $role=$_POST["business"];
	     $isError = false;
	    if(str_word_count($firstname)> 1) {
	    	$isError = true;
	    	$app->set_notify('danger', 'firstname-error');
	    }
	    if($isError == false && strlen($pwd) < 5) {
	    	$isError = true;
	    	$app->set_notify('danger', 'invalid-password');
	    }
	    if($isError == false) {
		 	if ($db->get_value('user', '*', "email='".$email."'")) {
		 		$isError = true;
		        $app->set_notify('danger', 'email-exist');
		    }
	    }

	    if($isError == false) {
	    	$sql="insert into `user`(`first_name`,`last_name`,`email`,`password`,`role`,`created_at`,`updated_at`) values(' " . $firstname ."','". $lastname ."','".$email."','".$pwd."','".$role."', now(),now())";

		    	$db->get_query_insert($sql);
	    }
  	}
    public function signIn() {
     	global $db;
     	global $app;
        $email=$_POST["email1"];
	    $pwd=$_POST["password1"];
        $result=$db->get_value('user', '*', "email = '".$email."' and password  ='".$pwd."'");
        if($result) {
           $_SESSION['user']=$result;
           $app->redirection();
        }
        else {
            $app->set_notify('danger', 'user-error');
        }
    }
    public function isSignedIn() {
    	return isset($_SESSION['user'])?true:false;
    } 
    public function getUserDetailById($id){
    	global $db;
    	$result = $db->get_query("SELECT * FROM " .$this->users." WHERE id=".$id);
			$my_notifications = array();
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$my_notifications[] = $row;
			}
			return $my_notifications[0];
    }
  
    /*public function findSearch(){
    	$ToSearch = $_POST['typehead'];
	    global $db;
    	$result = $db->get_query("SELECT * FROM " .$this->hotel_find." WHERE  city=" . $ToSearch);
    	  $find = array();
    	  //print_r($find);
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
				{
                 
					$find[] = $row;
			    }
			          return $find;
    } 
*/
}

?>