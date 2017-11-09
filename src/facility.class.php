<?php 
	/**
	* 
	*/
	class Facility {
		public $tableName = "facility";
		public function get() {
			global $db;
			$result = $db->get_query("select * from " . $this->tableName);
			$facilities = array();
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$facilities[] = $row;
			}
			return $facilities;
		}

		public function getActive() {
			global $db;
			$result = $db->get_query("select * from " . $this->tableName . " WHERE is_active = 1");
			$facilities = array();
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$facilities[] = $row;
			}
			return $facilities;
		}		

		public function getById($id) {
			return $db->get_value($tableName, "*", "id = '".$id."'");
		}
		public function update($id) {
            global $db;
            $name=$_POST["name"];
			$result = $db-> get_query("UPDATE " .$this->tableName." SET name='".$name."',   WHERE id=".$id);
          return $result;
       }
		public function delete($id) {
                    global $db;
				    $result =$db-> get_query("DELETE FROM " .$this->tableName." WHERE id=".$id);
					return $result;
		}
		public function create() {

			$name=$_POST["name"];
			$action=$_POST["action"];
			global $db;
			$result = $db->get_query_insert("insert into " .$this->tableName."(`name`,`is_active`) values('".$name."','".$action."')");

        }
	
	}

?>