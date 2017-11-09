<?php
require_once ('init.php');

if(isset($_POST["submit"])) {
 		
$hotels =$hotel->search($_POST['typehead']);
//die();
}
include('header.php');
?>
<hr><hr>
<div class="container">
 <div class="row">
  
 <?php foreach ($hotels as $h) { ?>
 	
     
<div class="col-lg-4 portfolio-item">
   <div class="card h-100">
   <h4 class="card-title">
    <a href="#">hotel details</a>
    </h4>
    <h2><?php echo $h['name'] ?></h2>   
    <h4><?php echo $h['address'] ?></h4>
    <?php $image = $hotel->getCoverImages($h['id']); print_r($image); ?>

    <img src="<?php echo $image['images'] ;?>" />
    
   </div>
</div>
     
     <?php } ?>      
        

       

        </div>
        </div>