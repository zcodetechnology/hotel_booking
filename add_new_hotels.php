<?php
require_once ('init.php');
$getCities = $hotel->getCities();

if(isset($_POST['add_hotel_btn'])){
	$isAdded = $hotel->add();      
	if($isAdded) {
		$app->redirection('my_hotels.php');
	}
}
include_once('header.php');
 ?>
<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <div class="container">
 	<div class="alert alert-<?php echo $notify_action; ?>">
      <?php echo $notify_message; ?>
  </div>
  <form class="form-horizontal add_new_hotels" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" for="full_name">Full Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="full_name" placeholder="Enter Full Name" name="full_name" value="<?php echo isset($_POST['full_name']) ? $_POST['full_name'] : ""; ?>">
        <p class = "error"></p>
      </div>
    </div>
    <div class="form-group">
   <label class="control-label col-sm-2" for="address">Address:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ""; ?>">
        <p class = "error"></p>
      </div>
  </div>
    <div class="form-group">
     <label class="control-label col-sm-2" for="cities">Cities:</label>
      <div class="col-sm-10">
        <select name = "city" class = "form-control" style="height: 35px;">
          <option >Select city</option>
           <?php $count = 0; foreach ($getCities as $cities) {
           $count++;?>
          <option value="<?php echo $cities['id'];?>"><?php echo $cities['city_name'];?></option>
          <?php } ?>
        </select>
      </div>
    </div>
   <div class="form-group">
   <label class="control-label col-sm-2" for="status">Status:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="status" placeholder="Enter status" name="status" value="<?php echo isset($_POST['status']) ? $_POST['status'] : ""; ?>">
        <p class = "error"></p>
      </div>

       <div class="form-group">
   <label class="control-label col-sm-2" for="images">Cover Image</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" id="cover_image" name="cover_image"/>
        <p class = "error"></p>
      </div>
      </div>


       <div class="form-group">
   <label class="control-label col-sm-2" for="images">Images</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" id="multifiles"  name="multifiles[]" multiple/>

        <p class = "error"></p>
      </div>
      </div>
  </div>
  <div class="form-group add">
      <div class="col-sm-8">
        <button type="submit" class="btn btn-success btn-block" name = "add_hotel_btn">Add Hotel</button>
      </div>
  </div>
</form>
