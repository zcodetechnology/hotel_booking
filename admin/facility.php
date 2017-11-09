<?php


require_once ('../init.php');
include('../header.php');
if(isset($_POST["create"])) {
      $facility->create();
}
if(isset($_GET["id"])) {
      $facility->delete($_GET["id"]);
      $app->redirection('admin/facility.php');
}
if(isset($_GET["id"])) {

      $facility->update($_GET["name"]);
       $app->redirection('admin/facility.php');
        
}
$facilities = $facility->get();
if(isset($_GET['signout'])) {
  $app->clear_sessions();
}

?>

 <link href="<?php echo PUBLIC_URL ?>css/facility.css" rel="stylesheet">
		
    <hr>
	<div align="right">
         <button class="btn btn-default" type="submit"  data-toggle="modal" data-target="#exampleModal"><strong>add more</strong></button>
    </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			      <div class="modal-header">
			        
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
            <div class="modal-body">


        <div id="examplemodal">
               <form method="post">
               
				     <div class="form-group">

				                <label for="email">
				                    Name
				                </label>
				                <input type="text" id="name" name="name" class="form-control">
				            </div>
				       <div class="form-group">
				                <label for="password">
				                    action
				                </label>
				                <input type="checkbox" id="action" name="action" class="form-control">
				       </div>
				    <button type="submit" name="create">save</button>
				</form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="container">
<table class="table table-hover table-bordered">
		<tr>
			<td>SNo</td>
			<td>Name</td>
			<td>Active</td>
			<td>Action</td>
		</tr>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function hideEdit(event, id) {
	$(event.target).hide();
   	$("#name" + id).hide();
	$(event.target).parent().find('.btn-edit').show();
   	$("#text" + id).show();
}
function showEdit(e, id) {
	$("#text"+id).hide();
	$("#name"+id).show();
	$(e.target).parent().find('.btn-cancel').show();
    $(e.target).hide();
}
function saveMe(e) {
	var id = $(e.target).attr("data-id");
	$.ajax({
        type: "POST",
        url: "http://localhost/demo-exam/src/request.php",
        data: {action:"editFacilityName", id:id, value:e.target.value},
        success: function(res){
        	console.log(res, res.success);
        	if(res.success) {
        		$(e.target).hide();
        		$(e.target).parent().parent().find('.btn-edit').show();
        		$(e.target).parent().parent().find('.btn-cancel').hide();
        		$(e.target).parent().find('span').show().text(e.target.value);
        	}
           alert(res.message);
        },
        
        error: function(err){
            console.log(err);
        }
    
    });
}
function changesStatus(val, id) {
	console.log($(val.target).is(":checked"), id);
	$.ajax({
        type: "POST",
        url: "http://localhost/demo-exam/src/request.php",
        data: {action:"editaction", id:id, value:$(val.target).is(":checked")},
        success: function(){
			if ( $("id").is(':checked') ) {
				alert("updated");
			
		    }
		}
	});
}
</script>
		<?php $count = 0; foreach($facilities as $f) {
		 $count++;?> 
			<tr>
			<td><?php echo $count ?></td>
				<td><span name="text" id="text<?php echo $f['id']; ?>"><?php echo $f['name']?></span>
				<input type="text" data-id="<?php echo $f['id'];  ?>" onblur="saveMe(event);" style="display:none" name="name" id="name<?php echo $f['id']; ?>" value="<?=$f['name']?>" ></td>
				<td>
				    <label class="switch">
				     <input  type="checkbox" id="action<?php echo $f['id']; ?>" onchange="changesStatus(event, <?php echo $f['id']; ?>)" />
				     <span class="slider round" ></span>
				    </label>
				</td>
				<td>
					   <button onclick="showEdit(event, <?php echo $f['id'];  ?>)"  name="update" class="btn btn-primary btn-edit"> edit</button>


					   <button onclick="hideEdit(event, <?php echo $f['id'];  ?>)" class="btn btn-info btn-cancel" style="display: none;"> cancel</button>

					   <a href="<?php echo $_SERVER['PHP_SELF']."?id=".$f['id'];?>" onclick ="return confirm ('are u sure?')"><button name="delete" class="btn btn-danger">delete</button></a>
				</td>
			</tr>
		<?php } ?>
</table>
    </div>
	</body>

</html>