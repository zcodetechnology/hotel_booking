<?php
include('../header.php');
if(isset($_POST['add_more_btn'])){
  $isAdded = $admin->adminedit();
  
    $app->redirection('admin/hotels.php');
  

}
?>  
<style>
  .form{

        margin-top:100px;
  }
</style>

 <div class="container">
 <form  class="form" method="POST">

    <div class="form-group">
      <label  for="hotel_name">
      hotel name
      </label>
        <input type="text" class="form-control" id="h_name" placeholder="Enter hotel Name" name="h_name" value="<?php echo isset($_POST['h_name']) ? $_POST['h_name'] : ""; ?>">
      </div>


    <div class="form-group">
   <label for="approve">approve type:</label>
      <input type="text" class="form-control" id="approve" placeholder="Enter Address" name="approve" value="<?php echo isset($_POST['approve']) ? $_POST['approve'] : ""; ?>">
       </div>
    
    <div class="form-group">
      <label  for="city">reason:</label>
       <input type="text" class="form-control" id="city" placeholder="Enter reason" name="reason" value="<?php echo isset($_POST['reason']) ? $_POST['reason'] : ""; ?>">
      </div>


   
        <button type="submit" class="btn btn-success btn-block" name = "add_more_btn">Add Hotel</button>
      
 </form>
</div>