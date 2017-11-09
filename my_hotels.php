<?php
include('init.php');
$hotels = $hotel->get();
//$search = $hotel->search();
if(isset($_GET["id"])) {
  $hotel->delete($_GET["id"]);
  $app->redirection('my_hotels.php');
}
if(isset($_POST["search"])) {
  //if(preg_match("^/[A-Za-z]+/", $_POST['valueToSearch']))
  $hotel->search();
  $app->redirection('my_hotels.php');
}
include('header.php');
 ?>
 <style type="text/css">
   .add_new_hotel_btn{
  float: right;
}
 </style>
 <link rel="stylesheet" href="css/my_hotels.css">
<div class="container">
  <h2>My hotels</h2>
  <div>
  <form method="get">
  <input type="text" name="valueToSearch" placeholder="Search Record..">
    <input type="submit" name="search" class="btn btn-success" value="search">
    </form>
    </div>
    <div class="add_new_hotel_btn ">
    <a href="<?php echo PUBLIC_URL; ?>add_new_hotels.php"><button type="button" class="btn btn-success">Add New Hotel</button></a>
  </div>
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Serial No</th>
        <th>Full Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Status</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Approve</th>
        <th>Action</th>
        <th>Add New Room</th>
        <th>Room count</th>
      </tr>
    </thead>
    <tbody>     
       <?php $count = 0; foreach ($hotels as $h) {
        $count++;?>
        <td><?php echo $count ?></td>
        <td><?php echo $h['name'];?></td>
        <td><?php echo $h['address'];?></td>
        <td><?php echo $h['city'];?></td>
        <td><?php echo $h['status'];?></td>
        <td><?php echo $h['created_at'];?></td>
        <td><?php echo $h['updated_at'];?></td>
        <td><?php echo $h['approve'] == "1"?"<span style='color:green'>Yes</span>":"<span style='color:red'>No</span>"; ?></td>
        <!--<td><?php //if($hotel['approve'] == "1") { echo "<span style='color:green'>Yes</span>"; } else { echo "<span style='color:red'>No</span>";} ?></td>-->
        <td> <a href="<?php echo $_SERVER['PHP_SELF']."?id=".$h['id'];?>" onclick ="return confirm ('Are u Sure?')"><button name="delete" class="btn btn-danger">delete</button></a></td>
        <td> 
          
        <div class="add_new_room_btn">
        <a href="<?php echo PUBLIC_URL; ?>rooms.php?id=<?php echo $h['id']; ?>"><button name="add" type="button" <?php echo $h['approve'] == 1 ? "":"disabled" ?> class="btn btn-success">Add</button></a>
      </div>
      
    </td>
    <td><?php echo $hotel->getroomcount($h['id']);?></td>
      </tr>
    </tbody>
    <?php }?>
  </table>
  </div>

</div>
</body>
</html>