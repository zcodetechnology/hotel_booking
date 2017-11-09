<?php
    require_once ('../init.php');
    header('Content-Type: application/json');
    $action = isset($_POST['action']) ? $_POST['action'] : $_GET['action'];
    switch($action) {
        case "editFacilityName" :
            $name = $_POST['value'];
            $id = $_POST['id'];
             
            $x;
            if($name=="") {
                $x = array('message' => "you did not fill out the required field" , "success"=>false);

                
            } else { 
                $db->get_query("update facility set name = '".$name."' where id=".$id);
                $x = array('message' => "successfully updated", "success"=>true);
                
            }
            echo json_encode($x);
            break;

        case "editaction" :
            $id = $_POST['id'];
            $value = $_POST['value'];
            $db->get_query("update facility set is_active = ".$value." where id=".$id);
            $y = array('message' => "successfully updated", "success"=>0); 
           break;

        case "citiSugg" :
     
            $type=$_POST['query'];
            $array = array();
            //echo "select * from cities where city_name LIKE '%".$type."%'";
            $result = $db->get_query("select * from cities where city_name LIKE '%".$type."%' ORDER BY city_name");
            while($row=$result->fetch(PDO::FETCH_ASSOC)) {
              $array[] = $row['city_name'];
            }
            echo json_encode($array);
            break;
    }
?>