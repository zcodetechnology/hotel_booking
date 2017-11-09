<?php
/**
 * Created by PhpStorm.
 * User: kumar
 * Date: 03/10/2017
 * Time: 10:18 PM
 */

define('APP_VERSION','0.0.0');
define('MODE_DEV', true);
define('TIME_STAMP', time());
define('EXT_URL','/');
if(MODE_DEV) {
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME', 'register');
    define('DB_HOST','192.168.1.4');

    define('APP_HOST', 'localhost');
    define('PUBLIC_URL','http://'.APP_HOST.'/demo-exam/');
} else {
    define('DB_USER','root');
    define('DB_PASS','******');
    define('DB_NAME', 'demo_exam');
    define('DB_HOST','localhost');

    define('APP_HOST', '168.235.91.233');
    define('PUBLIC_URL','http://'.APP_HOST.'/demo-exam/');
}

define('AJAX_URL', PUBLIC_URL. 'src/request.php');
define('PUBLIC_RESOURCE',PUBLIC_URL. 'app/public/');
define('APP_PATH', dirname(dirname(__FILE__)));
define('USER_APP', PUBLIC_URL. 'app/users/login.php');
define('ADMIN_APP', PUBLIC_URL. 'app/admin/login.php');

define("USER_MENU", serialize(array(
    array('name' => 'Home', 'link' => PUBLIC_URL . 'home.php', 'order' =>  1),
    array('name' => 'My Profile', 'link' => PUBLIC_URL . 'profile.php', 'order' => 2),
    array('name' => 'My Booking', 'link' => PUBLIC_URL . 'my_bookings.php', 'order' => 3),
    array('name' => 'Sign out', 'link' => PUBLIC_URL . 'index.php?signout', 'order' => 5)
    )));

define("ADMIN_MENU", serialize(array(
    array('name' => 'Home', 'link' => PUBLIC_URL . 'home.php', 'order' =>  1),
    array('name' => 'Profile', 'link' => PUBLIC_URL . 'profile.php', 'order' => 2),
    array('name' => 'My Booking', 'link' => PUBLIC_URL . 'my_bookings.php', 'order' => 3),
    array('name' => 'Orders', 'link' => PUBLIC_URL . 'orders.php', 'order' => 3),
    array('name' => 'Settings', 'link' => PUBLIC_URL . 'settings.php', 'order' => 4),
    array('name' => 'MY Hotels', 'link' => PUBLIC_URL . 'my_hotels.php?signout', 'order' => 5),
     array('name' => 'Notification', 'link' => PUBLIC_URL . 'notifications.php', 'order' => 5),
    array('name' => 'Sign out', 'link' => PUBLIC_URL . 'index.php?signout', 'order' => 5)
    )));

define("SUPER_ADMIN_MENU", serialize(array(
    array('name' => 'Facility', 'link' => PUBLIC_URL . 'admin/facility.php', 'order' =>  1),
    array('name' => 'Hotels', 'link' => PUBLIC_URL . 'admin/hotels.php', 'order' =>  1),
    array('name' => 'Notification', 'link' => PUBLIC_URL . 'notifications.php', 'order' =>  1),
    array('name' => 'signout', 'link' => PUBLIC_URL . 'index.php?signout', 'order' =>  1)
    )));
?>
