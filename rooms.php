<?php
include('init.php');

if(isset($_POST['add_room_btn'])){
	$isAdded = $room->addRoom();      
	if($isAdded) {
		$app->redirection('my_hotels.php');
	}
}
include('header.php');
$facilities = $facility->getActive();

 ?>
 <style type="text/css">
 	.rooms{
	float: left;
	width: 50%;
	margin-top:50px;
}
	.add .btn{
	margin-left: 98px;
	width: 458px;
}
input[type="checkbox"]{
  width: 20px; /*Desired width*/
  height: 20px; /*Desired height*/
}
 </style>
 <link rel="stylesheet" href="css/style.css">
 <div class="container">
 	<div class="alert alert-<?php echo $notify_action; ?>">
      <?php echo $notify_message; ?>
  </div>
  
  <form class="form-horizontal" action="" enctype="multipart/form-data" method="POST">
  	<section class="rooms">
  	<input type="hidden" name="hotel_id" value="<?php echo $_GET['id'] ?>">
  	<input type="hidden" name="room_id" value="<?php echo $_GET['id'] ?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name"> Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ""; ?>">
        <p class = "error"></p>
      </div>
    </div>
    <div class="form-group">
   <label class="control-label col-sm-2" for="occupancy">Occupancy:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="occupancy" placeholder="Enter Occupancy" name="occupancy" value="<?php echo isset($_POST['occupancy']) ? $_POST['occupancy'] : ""; ?>">
        <p class = "error"></p>
      </div>
  </div>
   <div class="form-group">
   <label class="control-label col-sm-2" for="floor">Floor:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="floor" placeholder="Enter Floor" name="floor" value="<?php echo isset($_POST['floor']) ? $_POST['floor'] : ""; ?>">
        <p class = "error"></p>
      </div>
  </div>
   <div class="form-group">
   <label class="control-label col-sm-2" for="price">Price:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ""; ?>">
        <p class = "error"></p>
      </div>
  </div>
   <div class="form-group">
   <label class="control-label col-sm-2" for="discount">Discount:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="discount" placeholder="Enter Discount" name="discount" value="<?php echo isset($_POST['discount']) ? $_POST['discount'] : ""; ?>">
        <p class = "error"></p>
      </div>
  </div>
   <div class="form-group">
   
   <label class="control-label col-sm-2" for="facilities">Facilities:</label>
      <div class="col-sm-10">
      	<?php $count = 0; foreach($facilities as $f) {
		 $count++;?>
		 <label class="checkbox-inline">
        <input type="checkbox" value="<?php echo $f['id'];?>" class="form-control" id="facility" name="facilities[]"><?php echo $f['name'];?>
        </label>

        <?php } ?>
        <p class = "error"></p>
      </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="discount">Images</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" id="multifiles" placeholder="Enter Discount" name="multifiles[]" multiple/>

        <p class = "error"></p>
      </div>
      </div>



  <div class="form-group add">
      <div class="col-sm-8">
      	
        <button type="submit" class="btn btn-success form-control btn-block" name = "add_room_btn">Add Room</button>
      </div>
  </div>
  </section><!--section-END-->
</div>
</form>
</div><!--container-END-->