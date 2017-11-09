<?php
/**
 * Created by PhpStorm.
 * User: kumar
 * Date: 03/10/2017
 * Time: 10:44 PM
 */
require_once(dirname(__FILE__) . '/config/init.php');
require_once(dirname(__FILE__) . '/config/default_lang.php');
require_once(APP_PATH . '/config/db_connection.php');
require_once(APP_PATH . '/src/app.class.php');
require_once(APP_PATH . '/src/dk_lib.php');
require_once(APP_PATH . '/src/user.class.php');
require_once(APP_PATH . '/src/facility.class.php');
require_once(APP_PATH . '/src/my_hotels.class.php');
require_once(APP_PATH . '/src/notifications.class.php');
require_once(APP_PATH . '/src/rooms.class.php');
$db = new dbConnection();
$app = new App();
$utility = new Utility();
$user = new User();
$facility = new Facility();
$hotel = new Hotel();
$notification = new Notification();
$room = new Room();
?>