<?php
		ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/config.php');

include('includes/header.php');
include('includes/logo.php');
    $myusername=$_SESSION['myusername'];
    $mypassword=$_SESSION['mypassword'];
	
if (!isset($_SESSION['permission'])) {
header('Location: login.php');
}
?>
<div class="col main pt-5 mt-3 ">	
			<div class="row mb-3">
			
			
<?php
		$stmt = $conn->prepare("SELECT ID FROM users where username = '$myusername' ");     
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc())
			{
				$id = $row['ID'];
			}
		}
		$stmt->close();

		$stmt = $conn->prepare("SELECT * FROM house_to_cus where user_id = '$id'");     
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc())
			{
	
	            $house_id = $row['house_id'];
	            $num=1;
	            /////////////////////////////////////////////////////////
	            $current_date=date("Y-m-d");
	            $stmt0 = $conn->prepare("SELECT count(*) as num FROM data_entry WHERE Days <= '$current_date' and House_ID = '$house_id' ");     
                $stmt0->execute();
                $result0 = $stmt0->get_result();
                if ($result0->num_rows > 0) 
                {
	            ////////////////////////////////////////
        	        while ($row0 = $result0->fetch_assoc())
        			{
        			    $num=$row0['num'];
        			}
			    }
			    $stmt0->close();
	            echo '
	                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body bg-success">
					        <div class="rotate">';
            					if($num>0)
            					{
            					header("Refresh: 60");
            					//////////////////////////////////////// Android Notification push////////////////////////////////////
            					$firebase = new Firebase();
                                $push = new Push();
                                // optional payload
                                $payload = array();
                                $payload['team'] = 'Ncc Servcies';
                                $payload['score'] = '5.6';
                                // push type - single user / topic
                                $push_type = "topic";
                                // whether to include to image or not
                                $title=$txtVals['warningTitle'];
                                $message=$txtVals['warningMessage'];
                                $include_image = isset($_GET['include_image']) ? TRUE : FALSE;
                                $push->setTitle($title);
                                $push->setMessage($message);
                                if ($include_image) {
                                    $push->setImage('https://api.androidhive.info/images/minion.jpg');
                                } else {
                                    $push->setImage('');
                                }
                                $push->setIsBackground(TRUE);
                                $push->setPayload($payload);
                                $json = '';
                                $response = '';
                                if ($push_type == 'topic') {
                                    $json = $push->getPush();
                                    $response = $firebase->sendToTopic('global', $json);
                                } else if ($push_type == 'individual') {
                                    $json = $push->getPush();
                                    $regId = isset($_GET['regId']) ? $_GET['regId'] : '';
                                    $response = $firebase->send($regId, $json);
                                }
            					/////////////////////////////////////////////////End Android ///////////////////////////////////////////
            					
            					
            					echo '<span style="font-size:20px;" class="pull-right showopacity badge">'.$num.'</span>';
            					$soundfile="img/notification.mp3";
                                        echo "<script>
                                        var audioElement = document.createElement('audio');
                                        audioElement.setAttribute('src', '".$soundfile."');
                                        audioElement.play();</script>";
            					}

                            echo '<i class="fa fa-home fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">'.$txtVals["housecode"].'</h6>
                            <h1 class="display-4">'. $house_id.'</h1>
							<a href="aqsat.php?house_id='.$house_id.'" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
				';
	
	
	
        }
	
	}	
	$stmt->close();
?>
			
			
<!--   دوگمەی گەڕانەوە بۆ پەرەی داشبۆرد
	            <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card bg-primary text-white h-100">
					
                        <div class="card-body bg-primary">
					        <div class="rotate">
                                <i class="fa fa-landmark fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Dashboard</h6>
                            <h1 class="display-4">Dashboard</h1>
							<a href="#" class="stretched-link"></a>
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
                            <h6 class="text-uppercase"><?php echo $txtVals['logout'];?></h6>
                            <h4 class="display-6"><?php echo $txtVals['logedin'];?><?php echo $myusername;?> </h4>
							<a href="logout.php" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
				
				
			</div>
		</div>
		
		
		
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Enterprise Software Group  <?php echo date("Y");?></span>
          </div>
        </div>
      </footer>
