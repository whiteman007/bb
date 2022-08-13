<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
include("includes/config.php");
include('includes/header.php');
?>
<html>
<style>
	input{
	border-radius: 0px 5px 5px 0px;
    height: 40px;
    border: none;
    background: #64396422;
	text-align:center;

	}
	
	
</style>

<?php


if(isset($_SESSION['permission']))
{
	
	if(	$_SESSION['permission']==1)
	{
		header("Location: cpanel_aqsat.php");
		exit;
	}
	else
	{
		
		header("Location: dashboard.php");
		exit;
	}
}
$Error ="";
$successMessage ="";

if (isset($_POST['submit']))
{
  if ( !($_POST['myusername'] == "" && $_POST['mypassword'] == "" ))
  {

		$myusername=$_POST['myusername'];
		$mypassword=$_POST['mypassword']; 
		$pass_crypt=md5($mypassword);   
		$stmt = $conn->prepare("SELECT * FROM users WHERE username = '$myusername' and password = '$pass_crypt'");     
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
	        	$_SESSION['permission']=$row['permission'];
		  	} 
		}
     	$count0=$result->num_rows ;
		$stmt->close();
   		if ($count0 >0)
   		{ 
		  $_SESSION['myusername']=$_POST['myusername'];
		   	$_SESSION['mypassword']=$_POST['mypassword'];
		   	if($_SESSION['permission']=='1' && !empty($_POST['regid']))
        	{
                $sql1 = "UPDATE users SET regId='".$_POST['regid']."' WHERE username = '".$_SESSION['myusername']."' and password='".$pass_crypt."'";
    			$stmt1 = $conn->prepare($sql1);
                $stmt1->execute();
                $stmt1->close();
        	}
			// username and password sent from form 
			$myusername=$_POST['myusername']; 
			$mypassword=$_POST['mypassword']; 
			// To protect MySQL injection (more detail about MySQL injection)
			$myusername = htmlentities(mysqli_real_escape_string($conn,$myusername));
			$mypassword = htmlentities(mysqli_real_escape_string($conn,$mypassword));
		   	$pass_crypt=md5($mypassword);  
		   	$eng =$conn->prepare("SELECT * FROM users WHERE username = '$myusername' and password = '$pass_crypt' and permission='2'");     
		    $eng->execute();
		    $resultE = $eng->get_result();
		 	$count_eng=$resultE->num_rows; 


			$owner =$conn->prepare("SELECT * FROM users WHERE username = '$myusername' and password = '$pass_crypt' and permission='1'");     
		    $owner->execute();
		    $resultO = $owner->get_result();
		 	$count_owner=$resultO->num_rows;


			$qdm =$conn->prepare("SELECT * FROM users WHERE username = '$myusername' and password = '$pass_crypt' and permission='0'");     
		    $qdm->execute();
		    $resultA = $qdm->get_result();
		 	$count_admin=$resultA->num_rows;
			// If result matched $myusername and $mypassword, table row must be 1 row
			if($count_eng >0){

			// Register $myusername, $mypassword and redirect to file "login_success.php"
			$_SESSION['myusername'] = $myusername;
			$_SESSION['mypassword'] = $mypassword;

			//session_is_registered("myusername");
			//session_register("mypassword"); 
			header("Location:dashboard.php");
			exit;
			}


			// If result matched $myusername and $mypassword, table row must be 1 row
			if($count_owner >0){

			// Register $myusername, $mypassword and redirect to file "login_success.php"
			$_SESSION['myusername'] = $myusername;
			$_SESSION['mypassword'] = $mypassword;

			//session_is_registered("myusername");
			//session_register("mypassword"); 
			echo "lllllllllllllllllllllllllllllllllllll";

			header("Location:cpanel_aqsat.php");
			exit;
			}


			// If result matched $myusername and $mypassword, table row must be 1 row
			if($count_admin >0){

			// Register $myusername, $mypassword and redirect to file "login_success.php"
			$_SESSION['myusername'] = $myusername;
			$_SESSION['mypassword'] = $mypassword;

			//session_is_registered("myusername");
			//session_register("mypassword"); 
			echo "hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh";
			header("Location: dashboard.php");
			exit;
			//exit;
			}
		} //end c0
		else
			$Error = $txtVals['logininvalid'];

	}
	else
		$Error = $txtVals['insertusername'];
}

?>
<br/>
<br/>
<br/>


<div class="container login">

<h2><?php echo $txtVals['loginform']; ?></h2>


<hr/>
<form action="" method="post">
<!--<div class=" col-md-6">-->
<div class=" col-md-6 ">
<img src="img/entersoft.png" style="width:200px; height:200px"/>
</div>
<div class=" col-md-6 mt-6">
<span class="glyphicon glyphicon-user bg-icon  col-md-2 "></span>
<input type="text" name="myusername" placeholder="<?php echo $txtVals['username']; ?>" class="t col-md-10"/>
<input type="hidden" name="regid" value='<?php if(isset($_GET['regId']) && !empty($_GET['regId']))
{
    echo $_GET['regId'];
}?>'>

<br/>
<span class="glyphicon glyphicon-lock bg-icon col-md-2"></span>
<input type="password" name="mypassword" placeholder="<?php echo $txtVals['password']; ?>" class="t col-md-10"/>
<br/>
<button class="btn btn-primary" name="submit"><?php echo $txtVals['login']; ?></button>
		<span class="error"><?php echo $Error;?></span>
		<span class="success"><?php echo $successMessage;?></span>
</div>
</form>
</div>


</html>