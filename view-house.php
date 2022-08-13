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
?>
<div class="container">
<div class="form-group col-xs-12 col-sm-3 col-md-2 col-lg-12 ">

<table class="table table-striped table-hover table-responsive" id="example2" style="width: 100%;" >
<thead class="thead-light">
<tr>
<th class="col-lg-1 col-md-1">#</th>
<th class="col-lg-1 col-md-1"><?php echo $txtVals['houseid']; ?></th>
<th class="col-lg-1 col-md-1"><?php echo $txtVals['houseowner']; ?></th>

</tr>
</thead>
<tbody>
<?php
		$stmt = $conn->prepare("SELECT * FROM house_id");     
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) 
		{	$x=1;
			while ($row = $result->fetch_assoc())
			{
				$id = $row['ID'];
				$house_id = $row['House_ID'];
				$Cus_ID_01 = $row['Cus_ID_01'];
				$stmt2 = $conn->prepare("SELECT * FROM cus_id WHERE Cus_ID = '$Cus_ID_01'");     
				$stmt2->execute();
				$result2 = $stmt2->get_result();
				if ($result2->num_rows > 0) 
				{
				
					while ($row2 = $result2->fetch_assoc())
					{
						$cus_id = $row2['Cus_ID'];
						$cus_name = $row2['Cus_Name'];
						echo '<tr><td>'. $x .'</td><td>'. $house_id.' </td><td>'.$cus_name.'</td></tr>';
						$x++;
					}
				}
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
	var table = $('#example2').DataTable( {
		rowReorder: {
			selector: 'td:nth-child(2)'
		},
		responsive: true
	} );

	$('#example2')
	.removeClass( 'display' )
	.addClass('table table-bordered');
	/* Get Edit ID  */
	
});
</script>