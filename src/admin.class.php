<?php

class admin{
	public $table = "my_hotels";
public function admin_add() {
			global $db;
			$name = $_POST['full_name'];
			$result = $db->get_query("select * from " . $this->table);
			$admin = array();
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$admin[] = $row;
			}
			return $admin;
		}


public $tableName = "superadmin";
public function adminedit() {
			global $db;
			global $app;
			$hname = $_POST['h_name'];
			$approve = $_POST['approve'];
			$reason = $_POST['reason'];
			
				$result = $db->get_query("INSERT INTO ". $this->tableName." (hotels,type,reason,created_at,updated_at) VALUES('". $hname ."','". $approve ."','". $reason ."', now(),now())");
				return true;
			}
			

	  

	}
?>