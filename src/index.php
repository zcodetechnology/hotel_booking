<?php
/**
 * Created by PhpStorm.
 * User: kumar
 * Date: 04/10/2017
 * Time: 02:08 AM
 */
require_once ('init.php');

if(isset($_POST["signup"])) {
    $user->signUp();
}

if(isset($_POST["signin"])) {
    $user->signIn();
}

if(isset($_GET['signout'])) {
  $app->clear_sessions();
}

$myMenus = $app->getMyMenus();
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
    </div>
</div>
  </head>
  <body>
       <?php
        if($notify_code != "user-error")
        { ?>
          <div class="alert alert-<?php echo $notify_action; ?>">
          <?php echo $notify_message; ?>
      </div>
      <?php } ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><h1>Booking.com</h1></a>
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

            <?php foreach ($myMenus as $value) { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo $value['link']; ?>"><?php echo $value['name']; ?></a>
              </li>
            <?php } ?>
          </ul>
          
        </div>
        
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Hotel Paradise

      </h1>

      <div class="row">
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100" >

     
            <form method="post" style="background-color:orange; margin-left:0px" class="form-inline">
              <div class="container">
                 <h4>Name or address :</h4>
                <input type="text" name="nm" class="form-control">
                  <br/><br/> 

              </div>
               <div class="container">
                <h4>check-in  </h4>  
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="in_date" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
              </br></br>
            <div class="container">
            <h4>check-out</h4> 
               <div class="form-group">
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' name="out_date"  class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div></div>
              </br></br>
                 <div class="container">
              <h4> Booking type</h4>
                    <select name="room" class="form-control">
                        <option>Deluxe</option>
                        <option>standard room</option>
                        <option>AC super deluxe</option>
                    </select>
                </div>
               </br></br>
            <div class="container">
            <h4>   Are you travelling for work ?  <input type="radio" value="yes" name="ans" checked>yes
                <input type="radio" value="no" name="ans">no
                </br></br>
          </h4> <br/>
          </div>
            <div> 
                <h4> <input type="submit" name="submit"></h4>
            </div>    
                </form>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Interesting about us :</a>
              </h4>
                <p class="card-text">stay first pay after</br>Cab service</p>
                   <div style="background-color:#ffff66">
               <h3>Sign in to get discounts of upto 50% &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                 <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="background-color:dodgerblue">SIGN IN
                  </button>
               </h3>
            Reveal all secret Deals.
          </div>
          </div>
        </div>
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
   <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#sign"><strong>Sign In</strong></a></li>
      <li><a data-toggle="tab" href="#reg"><strong>Register</strong></a></li>
      
    </ul>
  
  <div class="tab-content">
    <div  id="sign" class="tab-pane fade in active">
      <?php if($notify_message == "user_error") ?> 
        <div class="alert alert-<?php echo $notify_action; ?>">
          <?php echo $notify_message; ?>
      </div>
       <?php ?>
     <form method="post">
     <div class="form-group">
                <label for="email">
                    Email
                </label>
                <input type="email" value="<?php echo isset($_POST['email1']) ? $_POST['email1'] : ""; ?>" id="email1" name="email1" class="form-control">
            </div>
       <div class="form-group">
                <label for="password">
                    Password
                </label>
                <input type="password" id="password1" name="password1" class="form-control">
       </div>
    <button type="submit" name="signin">sign in</button>
    </form>
   </div>
    <div class="tab-pane fade" id="reg">
        <form method="post">
            <div class="form-group">
                <label for="firstName">
                    First Name
                </label>
                <input type="text" id="firstName" name="firstName" class="form-control">
            </div>
            <div class="form-group">
                <label for="lastName">
                    Last Name
                </label>
                <input type="text" id="lastName" name="lastName" class="form-control">
            </div>
           <div class="form-group">
                <label for="email">
                    Email
                </label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
           <div class="form-group">
                <label for="password">
                    Password
                </label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
           <div class="form-group">
                <label for="business">
                    for Business
                 <input type="checkbox" id="business" value="admin" name="business" class="form-control">
                 <input type="hidden" id="business" name="business" value="user" class="form-control">
                </label>
            </div>
          <div class="form-group">
            <button type="submit" name="signup">Get started</button>
          </div>
       </form>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="<?php echo PUBLIC_URL ?>img/room1.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Two</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit aliquam aperiam nulla perferendis dolor nobis numquam, rem expedita, aliquid optio, alias illum eaque. Non magni, voluptates quae, necessitatibus unde temporibus.</p>
            </div>
          </div>
        </div>
        
        
        
        
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="<?php echo PUBLIC_URL ?>img/room6.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Three</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="<?php echo PUBLIC_URL ?>img/room3.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Four</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit aliquam aperiam nulla perferendis dolor nobis numquam, rem expedita, aliquid optio, alias illum eaque. Non magni, voluptates quae, necessitatibus unde temporibus.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="<?php echo PUBLIC_URL ?>img/room4.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Five</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="<?php echo PUBLIC_URL ?>img/room5.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Six</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit aliquam aperiam nulla perferendis dolor nobis numquam, rem expedita, aliquid optio, alias illum eaque. Non magni, voluptates quae, necessitatibus unde temporibus.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->


      <div class="container">
        


      </div>

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    
    
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker2').datetimepicker();
        });
    </script>



  </body>

</html>
