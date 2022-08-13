<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/config.php');
include('includes/header.php');
include('includes/logo.php');

	$id = $_GET['id'];
	if (isset($_POST['submit']))
	{
		
		$per = $_POST['per'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$password_incrypt = md5($password);
		if(empty($password) && empty($password))
		{
			$sql = "UPDATE users SET permission='$per' WHERE ID = $id";
			$stmt = $conn->prepare($sql);
			if($stmt->execute())
			{
				echo'<div class="alert alert-success">Edit User Success.</div>
				 <meta http-equiv = "refresh" content = "2; url = view-user.php" />';
			}
			else
			{
				echo'<div class="alert alert-danger">Error, Editing not success</div>
				 <meta http-equiv = "refresh" content = "2; url = edit-user.php?id='.$id.'" />';
			}
			$stmt->close();
		}
		else
		{
			if($password != $cpassword){
				echo'<div class="alert alert-danger">Password not match</div>';
			}
			else
			{
				//echo $per . '-'.$password .'-'.$cpassword ;
				
				$sql1 = "UPDATE users SET permission='$per',password='$password_incrypt' WHERE ID = $id";
				$stmt = $conn->prepare($sql1);
				if($stmt->execute())
				{
					echo'<div class="alert alert-success">Edit User Success.</div>
					 <meta http-equiv = "refresh" content = "2; url = view-user.php" />';
				}
				else
				{
					echo'<div class="alert alert-danger">Error, Editing not success</div>
					 <meta http-equiv = "refresh" content = "2; url = edit-user.php?id='.$id.'" />';
				}
				$stmt->close();
			} // password match
		}// passowrd empty
	} // submit
$stmt = $conn->prepare("SELECT * FROM users WHERE ID = $id");     
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc())
{
	$username = $row['username'];
	$permission=$row['permission'];
}
?>
<div class="container-fluid">

    <form class="form-horizontal" role="form" method="POST" action="edit-user.php?id=<?php echo $id ;?>">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" align="center">
                <h2><?php echo $txtVals['edituser']; ?> -  <c class="text-warning"><?php echo $username;?></c>
				
				</h2>
                <hr>
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
							<?php
							$opt=array($txtVals['admin'], $txtVals['owner'], $txtVals['engineer']);
							for ($i=0;$i<=2;$i++)
							{
								if($permission==$i)
									echo "<option value='".$i."' selected>".$opt[$i]." </option>";
								else
									echo "<option value='".$i."'>".$opt[$i]." </option>";
							}
							?>
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
                               placeholder="<?php echo $txtVals['password']; ?>">
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
                               id="password-confirm" placeholder="<?php echo $txtVals['repeatpassword']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit"  name="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> <?php echo $txtVals['update']; ?></button>
            </div>
        </div>
    </form>
</div>
