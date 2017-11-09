<?php
/**
 * Created by PhpStorm.
 * User: kumar
 * Date: 04/10/2017
 * Time: 02:08 AM
 */
//require_once ('init.php');
$myMenus = $app->getMyMenus();
$notify = $app->get_notify();
$notify_action = (!empty($notify['type'])) ? $notify['type'] : '';
$notify_message = (!empty($notify['message'])) ? $notify['message'] : '';
$notify_code = (!empty($notify['code'])) ? $notify['code'] : '';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>2 Col Portfolio - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo PUBLIC_URL ?>vendor/bootstrap-3.3.7/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo PUBLIC_URL ?>vendor/bootstrap-3.3.7/bootstrap-3.3.7/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo PUBLIC_URL ?>css/2-col-portfolio.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_URL ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_URL ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
   <script src="<?php echo PUBLIC_URL ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo PUBLIC_URL ?>vendor/bootstrap-3.3.7/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo PUBLIC_URL ?>vendor/moment.js"></script>
    <script src="<?php echo PUBLIC_URL ?>vendor/bootstrap-datetimepicker.js"></script>
    
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><h1>Booking.com</h1> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>

           <?php foreach ($myMenus as $value) { 
            $name = $value['name'];
            
            ?>
              <li class="nav-item">
                <?php if($value['name'] == "Notification") {
                  $notificationCount = $notification->getUnReadCount();
                  $name = $name . "(" . $notificationCount . ")";
                }
                  if($value['name'] == "MY Hotels") {
                    $hotelCount = $hotel->gethotelCount();
                    $name = $name . "(" . $hotelCount . ")";
                  }

                ?>
                <a class="nav-link" href="<?php echo $value['link']; ?>"><?php echo $name ?></a>
          
                 
                </li>


            <?php } ?>

              
          </ul>
          
        </div>
        
      </div>
    </nav>

    <!-- Page Content -->
<div class="container">

      <!-- Page Heading -->
     

      </h1>
      </div>
  </body>
</html>