<?php
include('init.php');

if(isset($_GET['approveId'])) {
  $hotel->approveHotel($_GET["approveId"]);
  $app->redirection('admin/hotels.php');
}

$notification->markAsRead();
$notifications  = $notification->getNotification();
include('header.php');
?>
<div class="container">
  <h2>Notifications</h2>                                                               
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Serial No</th>
        <th>Email</th>
        <th>Message</th>
        <th>Created at</th>
        <th>Updated at</th>
      </tr>
    </thead>
    <tbody>
       <?php $count = 0; foreach ($notifications as $notification) {
        $count++;?>
        <td><?php echo $count ?></td>
        <td><?php echo $notification['from_user_id']== 0 ? "From System": $user->getUserDetailById($notification['from_user_id'])['email'];?></td>
        <td><?php echo $notification['message'];?></td>
        <td><?php echo $notification['created_at'];?></td>
        <td><?php echo $notification['updated_at'];?></td>
      </tr>
    </tbody>
    <?php }?>
  </table>
  </div>
</div>
</body>
</html>