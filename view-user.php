
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
?>
<div class="container">
<div class="form-group col-xs-12 col-sm-3 col-md-2 col-lg-12 ">
<h3 align="center"><a href="add-user.php"><i class="fas fa-user-plus" ></i> <?php echo $txtVals["addnewuser"]; ?></a></h3>
<table class="table table-striped table-hover table-responsive" id="example" style="width: 100%;"> 
<thead class="thead-light">
<tr>
<th class="col-lg-1 col-md-1">#</th>
<th class="col-lg-1 col-md-1"><?php echo $txtVals["username"]; ?></th>
<th class="col-lg-1 col-md-1"> <?php echo $txtVals["edit"]; ?> </th>
<th class="col-lg-1 col-md-1"> <?php echo $txtVals["delete"]; ?> </th>
</tr>
</thead>
<tbody>
<?php



		$stmt = $conn->prepare("SELECT * FROM users");     
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) 
		{
			$x=1;
			while ($row = $result->fetch_assoc())
			{
				$id = $row['ID'];
				$username = $row['username'];
				$permission = $row['permission'];
				echo '<tr><td>'. $x .'</td><td>'. $username.' </td><td><a href="edit-user.php?id='.$id.'"><i class="far fa-edit"></i> </a> </td>
				<td><a href="delete-user.php?id='.$id.'"><i class="fas fa-trash-alt"></i></a></td>
				</tr>';
				$x++;
			}
		}





?>
</tbody>
</table>
</div>
</div>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
	
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	var table = $('#example').DataTable( {
		rowReorder: {
			selector: 'td:nth-child(2)'
		},
		responsive: true
	} );

	$('#example')
	.removeClass( 'display' )
	.addClass('table table-bordered');
	/* Get Edit ID  */
	
});


</script>