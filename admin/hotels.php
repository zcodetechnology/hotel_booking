<?php
include('../init.php');

$hotels = $hotel->get();


if(isset($_GET["id"])) {
  $hotel->updateHide($_GET["id"]);
 $app->redirection('my_hotels.php');

}
if(isset($_GET['approveId'])) {
	$hotel->approveHotel($_GET["approveId"]);
 	$app->redirection('admin/hotels.php');
}

if(isset($_GET['rejectid'])) {
    $hotel->noapprove($_GET["rejectid"]);
    $app->redirection('admin/hotels.php');
}
include('../header.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
			a.nav-link
			{
				display:none;
			}

			#add
			{
				display:inherit;
			}
</style>
 <link href="<?php echo PUBLIC_URL ?>css/facility.css" rel="stylesheet">

<div class="container">
    <div align="right">
         <a href="addmore.php"><button class="btn btn-success" type="submit"  data-toggle="modal" data-target="#exampleModal"><strong>add more</strong></button></a>
    </div>
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Serial No</th>
        <th>Hotel name</th>
        <th>approve</th>
        <th>Created at</th>
        <th>Updated at</th>
        
      </tr>
    </thead>
 

    <tbody>
    <?php $count = 0; foreach ($hotels as $hotel) {
        $count++;?>
    <td><?php echo $count ?></td>
    <td><?php echo $hotel['name'];?></td>
       
        <td>
        		<?php if($hotel['approve'] == 0) { ?>
        			<a class="btn btn-primary"  onclick="return confirm ('is approve?')" href="<?php echo $_SERVER['PHP_SELF']?>?approveId=<?php echo $hotel['id']; ?>">Approve</a>
		        	<a class="btn btn-danger" onclick="return confirm ('are u sure?')" href="<?php echo $_SERVER['PHP_SELF']?>?rejectid="<?php echo $hotel['id'];?>">reject</a>
        		<?php } else { ?>
        			<span>Approved</span>
        		<?php } ?>
		 </td>
		 <td><?php echo $hotel['created_at'];?></td>
        <td><?php echo $hotel['updated_at'];?></td>

    </tbody>
       <?php }?>
    </table>
    </div>
    </div>
    </body>
    </html>