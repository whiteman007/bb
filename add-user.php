<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/config.php');
include('includes/header.php');
include('includes/logo.php');
if (!isset($_SESSION['permission'])) {
header('Location: login.php');
}

	if (isset($_POST['submit'])){
	
		$username = $_POST['username'];
		$per = $_POST['per'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$password_incrypt = md5($password);

		if($password != $cpassword){
			echo'<div class="alert alert-danger">Password not match</div>';
		}
		else{
			
			$sql = "INSERT INTO users (username , password , permission) VALUES ('$username', '$password_incrypt', '$per')";
			$stmt = $conn->prepare($sql);
			if($stmt->execute()){
				echo'<div class="alert alert-success">User added success.</div>
				 <meta http-equiv = "refresh" content = "2; url = add-user.php" />
				';
			}
			else{
				echo'<div class="alert alert-danger">Error adding user.</div>';
			}
			$stmt->close();
			
	}
	}


?>




<div class="container-fluid">

    <form class="form-horizontal" role="form" method="POST" action="add-user.php">
        <div class="row">
            <div class="col-md-3">&nbsp; </div>
            <div class="col-md-6" align="center">
                <h2><?php echo $txtVals["addnewuser"]; ?></h2>
                <hr>
            </div>
        </div>
        <div class="row">
			<div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="username" class="form-control" id="name"
                               placeholder="<?php echo $txtVals['username']; ?>" required autofocus>
                    </div>
                </div>
            </div>
 
        </div>
        <div class="row">
			
			<div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-check-circle"></i></div>
                        					
						<select class="form-control" name="per"  >
							<option disabled selected><?php echo $txtVals['selecteuserrole']; ?></option>
							<option value="0"><?php echo $txtVals['admin']; ?></option>
							<option value="1"><?php echo $txtVals['owner']; ?></option>
							<option value="2"><?php echo $txtVals['engineer']; ?></option>
						
						</select>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
			
			<div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="<?php echo $txtVals['password']; ?>" required>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
			
			<div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-repeat"></i>
                        </div>
                        <input type="password" name="cpassword" class="form-control"
                               id="password-confirm" placeholder="<?php echo $txtVals['repeatpassword']; ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit"  name="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> <?php echo $txtVals['add']; ?></button>
            </div>
        </div>
    </form>
</div>
