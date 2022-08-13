<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
include('includes/config.php');
include('includes/header.php');
include('includes/logo.php');

if (!isset($_SESSION['permission'])) {
header('Location: login.php');
}


    $myusername=$_SESSION['myusername'];
    $mypassword=$_SESSION['mypassword'];
	
	$stmt = $conn->prepare("SELECT * FROM users");     
	$stmt->execute();
	$result = $stmt->get_result();
	$user_counter=$result->num_rows; 
	$stmt->close();
		
	$stmt = $conn->prepare("SELECT * FROM house_id");     
	$stmt->execute();
	$result = $stmt->get_result();
	$house_counter=$result->num_rows; 
	$stmt->close();

?>

<div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">
        <!--/col-->

        <div class="col main pt-5 mt-3 ">
            <!--<h1 class="display-4 d-none d-sm-block ">
            NCC Sale House System Dashboard
            </h1>
			-->
			
            <div class="row mb-3">
				
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
					
                        <div class="card-body bg-success">
					        <div class="rotate">
                                <i class="fa fa-user fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase"><?php echo $txtVals["users"]; ?></h6>
                            <h1 class="display-4"><?php echo $user_counter;?></h1>
							<a href="view-user.php" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
				
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body bg-danger">
                            <div class="rotate">
                                <i class="fa fa-home fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase"><?php echo $txtVals["houses"]; ?></h6>
                            <h1 class="display-4"><?php echo $house_counter;?></h1>
							<a href="view-house.php" class="stretched-link"></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fa fa-home fa-4x">+</i>
                            </div>
                            <h6 class="text-uppercase"><?php echo $txtVals["inserthouse"]; ?></h6>
                            <h1 class="display-4"><?php echo $house_counter;?></h1>
							<a href="add-house.php" class="stretched-link"></a>
                        </div>
                    </div>
                </div>

<!--				
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                               <i class="fas fa-calendar-alt fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Aqsat</h6>
                            <h1 class="display-4">125</h1>
							<a href="aqsat.php" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
-->				
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body">
                            <div class="rotate">
                                <i class="fas fa-sign-out-alt fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase"><?php echo $txtVals["logout"]; ?></h6>
                            <h4 class="display-6"><?php echo $txtVals["logedin"]; ?><?php echo $myusername;?> </h4>
							<a href="logout.php" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
				
            </div>
			
            <!--/row-->


            <hr>
            
<!--/.container-->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Enterprise Software Group  <?php echo date("Y");?></span>
          </div>
        </div>
      </footer>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <p>This is a dashboard layout for Bootstrap 4. This is an example of the Modal component which you can use to show content.
                Any content can be placed inside the modal and it can use the Bootstrap grid classes.</p>
                <p>
                    <a href="https://www.codeply.com/go/KrUO8QpyXP" target="_ext">Grab the code at Codeply</a>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary-outline" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
  
});
</script>