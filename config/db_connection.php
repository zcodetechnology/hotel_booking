<?php
/**
 * Created by PhpStorm.
 * User: kumar
 * Date: 03/10/2017
 * Time: 10:24 PM
 */

class dbConnection {
    /**
     * EXECUTE REQUEST
     *
     * @access public
     * @param mixed $query (default: NULL) : REQUEST
     * @param mixed $db_name (default: '') :
     * @return array
     */
    public function get_query($query = NULL, $db_name = '') {
        $valid = false;
        $db_name = (!empty($db_name)) ? $db_name : DB_NAME;
        if (isset($query)) {
            //CONNEXION
            try {
                $dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . $db_name, DB_USER, DB_PASS);
            } catch (PDOException $e) {
                print_r($e);
                die();
            }
            //EXECUTION
            $valid = $dbh->query($query);
            //CLOSE CONNEXION
            $dbh = NULL;
        }
        return $valid;
    }


    public function get_query_insert($query = NULL, $db_name = '') {

        $valid = false;
        $db_name = (!empty($db_name)) ? $db_name : DB_NAME;

        if (isset($query)) {

            //CONNEXION
            try {
                $dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . $db_name, DB_USER, DB_PASS);
            } catch (PDOException $e) {
                $this->redirection('error');
            }

            //EXECUTION
            $valid = $dbh->query($query);
            $valid = $dbh->lastInsertId();
            //CLOSE CONNEXION
            $dbh = NULL;
        }
        return $valid;
    }


    /**
     * RETURN COUNT VALUE FROM DATABASE
     *
     * @access public
     * @param mixed $table (default: NULL) : TABLE À ANALYSER
     * @param string $conditions (default: '') : CONDITIONS À RESPECTER
     * @return void
     */
    public function count_value($table = NULL, $conditions = '') {
        $value = 0;

        if (isset($table)) {

            //EXECUTE REQUEST

            $requete = $this->get_query("SELECT * FROM " . $table . " " . $conditions);

            //IF RESULT EXIST
            if (!empty($requete)) $value = $requete->rowCount();
        }


        return $value;
    }

    /**
     * RETURN SPECIFIC VALUE FROM DATABASE
     *
     * @access public
     * @param mixed $table (default: NULL)
     * @param mixed $field (default: NULL)
     * @param string $condition (default: "")
     * @param string $orderBy (default: "")
     * @param int $limit (default: 1)
     * @return array
     */
    public function get_value($table = NULL, $field = NULL, $condition = "", $orderBy = "", $limit = 1) {

        //VARIABLES
        $value = false;
        $limit = (gettype($limit) == 'integer') ? "LIMIT " . $limit : '';

        if (isset($table) && isset($field)) {

            if (!empty($condition)) $condition = "WHERE " . $condition;
            if (!empty($orderBy)) $orderBy = "ORDER BY " . $orderBy;

            //EXECUTION
            $requete = $this->get_query("SELECT " . $field . " FROM " . $table . " " . $condition . " " . $orderBy . " " . $limit);

            //IF RESULT EXIST
            if (!empty($requete)) $value = $requete->fetch(PDO::FETCH_ASSOC);
        }

        return $value;
    }
}
?>