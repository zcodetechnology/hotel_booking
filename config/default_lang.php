<?php
/**
 * Created by PhpStorm.
 * User: kumar
 * Date: 04/10/2017
 * Time: 01:14 AM
 */
$_notify = array();
//Erreur
$_notify['danger']['login-error'] = _("Your email and password don't match");
$_notify['success']['disconnect'] = _("See You Again !!");
$_notify['danger']['email-exist'] = _("Your email already exist");
$_notify['danger']['invalid-password'] = _("atleast 6 character,try again!");
$_notify['danger']['firstname-error'] = _("first name should not contain more than one word");
$_notify['success']['valid-user'] = _("valid user");
$_notify['danger']['user-error'] = _("your credential are not valid");

$_notify['danger']['name-error'] = _("Please Enter Name");
$_notify['danger']['invalid-name-error'] = _("Only letters and white space allowed");
$_notify['danger']['address-error'] = _("Please Enter Address");
$_notify['danger']['city-error'] = _("Please Enter City");
$_notify['danger']['status-error'] = _("Please Enter Status");

$_notify['danger']['name-error'] = _("Please Enter Name");
$_notify['danger']['invalid-name-error'] = _("Only letters and white space allowed");
$_notify['danger']['occupancy-error'] = _("Please Enter Occupancy");
$_notify['danger']['floor-error'] = _("Please Enter Floor");
$_notify['danger']['price-error'] = _("Please Enter price");
$_notify['danger']['price-negative-value-error'] = _("Negative value not allowed");
$_notify['danger']['discount-error'] = _("Please Enter Discount");
$_notify['danger']['discount-negative-value-error'] = _("Negative value not allowed");
$_notify['danger']['not-allowed-discount'] = _("Limit cross of discount");

$_notify['danger']['not-approved'] = _("This hotel is not approved");
$_notify['danger']['not-your-hotel'] = _("This is not your hotel");

define('TXT_NOTIFY', serialize($_notify));
?>