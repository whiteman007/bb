<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/config.php');
include('includes/header.php');
include('includes/logo.php');
$id = $_GET['id'];

if(isset($_POST['delete']))
{
	$sql = "DELETE FROM users WHERE ID = '$id' ";
	$stmt = $conn->prepare($sql);
	if($stmt->execute()){

	echo'<div class="alert alert-success">'.$txtVals["userdeleted"].'</div>
	<meta http-equiv = "refresh" content = "2; url = view-user.php" />';
	}
	else{
	echo'<div class="alert alert-danger">'.$txtVals["usernotdeleted"].'</div>
	<meta http-equiv = "refresh" content = "2; url = delete-user.php?id='.$id.'" />';
	}


}
?>

<div class="container">
<form action="delete-user.php?id=<?php echo $id;?>" method="POST">
<?php
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE ID = $id");     
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc())
{
$username = $row['username'];

}
?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2><?php echo $txtVals["areyousuredelete"]; ?> -  <c class="text-danger"><?php echo $username;?> <?php echo $txtVals["quest"]; ?></c>
				
				</h2>
                <hr>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
				<button class="btn btn-primary " name="delete"><?php echo $txtVals["yes"]; ?></button>
				<a href="view-user.php" id="cancel" name="cancel" class="btn btn-warning "><?php echo $txtVals["cancel"]; ?></a>

            </div>
        </div>

</form>
</div>