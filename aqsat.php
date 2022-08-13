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

////////////////////////////////// By Halo ////////////////////////
$myusername=$_SESSION['myusername'];
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
///////////////
$stmtN = $conn->prepare("SELECT * FROM sending_notification where Cus_ID = '$id' and House_ID like '".$_GET['house_id']."' ");     
$stmtN->execute();
$result = $stmtN->get_result();
if ($result->num_rows > 0) 
{
	while ($row = $result->fetch_assoc())
	{
		$houseID = $row['House_ID'];
		$date_note = $row['Notification_Date'];
	}
}
$stmtN->close();
push_notification_users($conn, $id, $houseID, $date_note,$firebase,$push);


////////////////////////////////// End Halo /////////////////////

?>



<div class="col-xlg-12 col-lg-12 col-md-12 col-sm-12 text-center">
<?php
$house_id = $_GET['house_id'];
$stmt = $conn->prepare("SELECT * FROM data_entry_02_main WHERE House_ID = '$house_id' Order By  Paid_No ASC limit 1");     
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) 
{
	while ($row = $result->fetch_assoc())
	{
		$House_ID = $row['House_ID'];
		$Cus_Name = $row['Cus_Name'];
		
echo '<div class=""><div class="alert alert-success ">'. $house_id.'</div></div>';



	}
}
?>



</div>
<div class="col-xlg-12 col-lg-12 col-md-12 col-sm-12">
<table class="table table-striped table-hover table-responsive " id="example2" style="width: 100%;" >
    <thead><tr>
	<th class="col-lg-1 col-md-1"><?php echo $txtVals["batches"]; ?></th>
	<th class="col-lg-1 col-md-1"><?php echo $txtVals["Date"]; ?></th>
	<th class="col-lg-1 col-md-1"><?php echo $txtVals["sdate"]; ?></th>
	<th class="col-lg-1 col-md-1"><?php echo $txtVals["Delay Days"]; ?></th>
	<th class="col-lg-1 col-md-1"><?php echo $txtVals["Document_No"]; ?></th>
	<th class="col-lg-2 col-md-1"><?php echo $txtVals["Vou_Type"]; ?> </th>
	<th class="col-lg-1 col-md-1"><?php echo $txtVals["Discount"]; ?> </th>
	<th class="col-lg-1 col-md-1"><?php echo $txtVals["Premium Amount"]; ?> </th>
	<th class="col-lg-1 col-md-1"><?php echo $txtVals["Sold Price"]; ?> </th>
	<th class="col-lg-2 col-md-1"><?php echo $txtVals["Receipts"]; ?> </th>
	<th class="col-lg-3 col-md-3"><?php echo $txtVals["Description"]; ?> </th>
	</tr></thead>
	
	<tbody>
<?php

$stmt = $conn->prepare("SELECT * FROM data_entry_02_main WHERE House_ID = '$house_id' Order By  Paid_No ASC");     
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) 
{
	while ($row = $result->fetch_assoc())
	{
		$House_ID = $row['House_ID'];
		$Paid_No = $row['Paid_No'];
		$days = $row['Days'];
		$days_02 = $row['Days_02'];
		$days_03 = $row['Days_03'];
		$Vou_ID = $row['Vou_ID'];
		$Vou_No = $row['Vou_No'];
		$Vou_Name = $row['Vou_Name'];
		$Dis_Percent = $row['Dis_Percent'];
		$Paid_Money = $row['Paid_Money'];
		$Madin = $row['Madin'];
		$Dain = $row['Dain'];
		$Description = $row['Description'];
		
		echo '
		<tr>
		<td>'.$Paid_No.'</td>
		<td>'.$days.'</td>
		<td>'.$days_02.'</td>
		<td>'.$days_03.'</td>
		<td>'.$Vou_No.'</td>
		<td>'.$Vou_Name.'</td>
		<td>'.$Dis_Percent.'</td>
		<td>'.number_format($Paid_Money).'</td>
		<td>'.number_format($Dain).'</td>
		<td>'.number_format($Madin).'</td>
		<td>'.$Description.'</td>
		</tr>';
	
	}
}
$stmt->close();
?>
<?php



?>
</tbody>
</table>
</div>

<div class="col-xlg-12 col-lg-12 col-md-12 col-sm-12">
		<div class="row mb-3">
				
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 py-6 text-center">
                    <div class="card bg-success text-white h-100">
					
                        <div class="card-body bg-success">
							<h5 class="display-4"></h5>
							<h4><?php echo $txtVals["Selling House"]; ?> :
					      
							 <?php 
							  
								$stmt1 = $conn->prepare("SELECT sum(Dain)As sum_dain FROM data_entry_02_main WHERE House_ID = '$house_id' AND Vou_ID = 31");     
								$stmt1->execute();
								$result = $stmt1->get_result();
								if ($result->num_rows > 0) 
								{
									while ($row = $result->fetch_assoc())
									{
										$sum_dain1 = $row['sum_dain'];
									
									echo number_format($sum_dain1).'$';
									}
								}
								$stmt1->close();
							?></h4>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-xl-3 col-lg-3 col-md-3  col-sm-6 col-xs-6 py-6 text-center">
                    <div class="card bg-success text-white h-100">
					
                        <div class="card-body bg-success">
						<h5 class="display-4"></h5>
						<h4><?php echo $txtVals["Discount"]; ?> :
					      
							 <?php 
						  
							$stmt1 = $conn->prepare("SELECT sum(Dain)As sum_dain FROM data_entry_02_main WHERE House_ID = '$house_id' AND Vou_ID = 32");     
							$stmt1->execute();
							$result = $stmt1->get_result();
							if ($result->num_rows > 0) 
							{
								while ($row = $result->fetch_assoc())
								{
									$sum_dain2 = $row['sum_dain'];
								
								echo number_format($sum_dain2).'$';
								}
							}
							$stmt1->close();
						?></h4>
                        </div>
                    </div>
                </div>
				
				<div class="col-xl-3 col-lg-3 col-md-3  col-sm-6 col-xs-6 py-6 text-center">
                    <div class="card bg-success text-white h-100">
					
                        <div class="card-body bg-success">
						<h5 class="display-4"></h5>
						<h4>اضافە المبیعات :
					      
							 <?php 
						  
							$stmt1 = $conn->prepare("SELECT sum(Dain)As sum_dain FROM data_entry_02_main WHERE House_ID = '$house_id' AND Vou_ID = 33");     
							$stmt1->execute();
							$result = $stmt1->get_result();
							if ($result->num_rows > 0) 
							{
								while ($row = $result->fetch_assoc())
								{
									$sum_dain3 = $row['sum_dain'];
								
								echo number_format($sum_dain3).'$';
								}
							}
							$stmt1->close();
						?></h4>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 py-6 text-center">
                    <div class="card bg-primary text-white h-100">
					
                        <div class="card-body bg-primary">
							<h5 class="display-4"></h5>
							<h4>کلفە الدار :
							  
								 <?php 
							  $kwlfa= $sum_dain1-$sum_dain2+$sum_dain3;
								echo number_format($kwlfa).'$';
							?></h4>
                        </div>
                    </div>
                </div>
				
				
					
			
		
	</div>
</div>



</hr>





<div class="col-xlg-12 col-lg-12 col-md-12 col-sm-12">
	<div class="row mb-3">
				
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 py-6 text-center">
                    <div class="card bg-dark text-white h-100">
					
                        <div class="card-body bg-dark">
						<h5 class="display-4"></h5>
						<h4>مقبوضات السابقە :
					      
							 <?php 
						  
							$stmt1 = $conn->prepare("SELECT sum(Madin)As sum_madin FROM data_entry_02_main WHERE House_ID = '$house_id' AND Vou_ID = 11");     
							$stmt1->execute();
							$result = $stmt1->get_result();
							if ($result->num_rows > 0) 
							{
								while ($row = $result->fetch_assoc())
								{
									$sum_dain5 = $row['sum_madin'];
								
								echo number_format($sum_dain5).'$';
								}
							}
							$stmt1->close();
						?></h4>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-xl-3 col-lg-3 col-md-3  col-sm-6 col-xs-6 py-6 text-center">
                    <div class="card bg-dark text-white h-100">
					
                        <div class="card-body bg-dark">
						<h5 class="display-4"></h5>
						<h4>مقبوضات الصندوق :
					      
							 <?php 
						  
							$stmt1 = $conn->prepare("SELECT sum(Madin)As Sum_Paid_Money FROM data_entry_02_main WHERE House_ID = '$house_id' AND Vou_ID = 12");     
							$stmt1->execute();
							$result = $stmt1->get_result();
							if ($result->num_rows > 0) 
							{
								while ($row = $result->fetch_assoc())
								{
									$sum_dain6 = $row['Sum_Paid_Money'];
								
								echo number_format($sum_dain6).'$';
								}
							}
							$stmt1->close();
						?></h4>
                        </div>
                    </div>
                </div>
				
				<div class="col-xl-3 col-lg-3 col-md-3  col-sm-6 col-xs-6 py-6 text-center">
                    <div class="card bg-dark text-white h-100">
					
                        <div class="card-body bg-dark">
						<h5 class="display-4"></h5>
						<h4>إیداع فی البنک :
					      
							 <?php 
						  
							$stmt1 = $conn->prepare("SELECT sum(Madin)As sum_madin FROM data_entry_02_main WHERE House_ID = '$house_id' AND Vou_ID = 13");     
							$stmt1->execute();
							$result = $stmt1->get_result();
							if ($result->num_rows > 0) 
							{
								while ($row = $result->fetch_assoc())
								{
									$sum_dain7 = $row['sum_madin'];
								
								echo number_format($sum_dain7).'$';
								}
							}
							$stmt1->close();
						?></h4>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-xl-3 col-lg-3 col-md-3  col-sm-6 col-xs-6 py-6 text-center">
                    <div class="card bg-primary text-white h-100">
					
                        <div class="card-body bg-primary">
						<h5 class="display-4"></h5>
						<h4>مجموع المقبوضات :
					      
							 <?php 
								$ko_maqbwzat = $sum_dain5+$sum_dain6+$sum_dain7;
								
								echo number_format($ko_maqbwzat).'$';
							 ?></h4>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-xl-3 col-lg-3 col-md-3  col-sm-6 col-xs-6 py-6 text-center mt-1">
                    <div class="card bg-info text-white h-100">
					
                        <div class="card-body bg-info">
						<h5 class="display-4"></h5>
						<h4>بدل نقد المقاولین :
					      
							 <?php 
						  
							$stmt1 = $conn->prepare("SELECT sum(Madin)As sum_madin FROM data_entry_02_main WHERE House_ID = '$house_id' AND Vou_ID = 14");     
							$stmt1->execute();
							$result = $stmt1->get_result();
							if ($result->num_rows > 0) 
							{
								while ($row = $result->fetch_assoc())
								{
									$sum_dain8 = $row['sum_madin'];
								
								echo number_format($sum_dain8).'$';
								}
							}
							$stmt1->close();
						?></h4>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-xl-3 col-lg-3 col-md-3  col-sm-6 col-xs-6 py-6 text-center mt-1">
                    <div class="card bg-info text-white h-100">
					
                        <div class="card-body bg-info">
						<h5 class="display-4"></h5>
						<h4>بدل العقارات :
					      
							 <?php 
						  
							$stmt1 = $conn->prepare("SELECT sum(Madin)As sum_madin FROM data_entry_02_main WHERE House_ID = '$house_id' AND Vou_ID = 15");     
							$stmt1->execute();
							$result = $stmt1->get_result();
							if ($result->num_rows > 0) 
							{
								while ($row = $result->fetch_assoc())
								{
									$sum_dain9 = $row['sum_madin'];
								
								echo number_format($sum_dain9).'$';
								}
							}
							$stmt1->close();
						?></h4>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 py-6 text-center mt-1">
                    <div class="card bg-primary text-white h-100">
					
                        <div class="card-body bg-primary">
						<h5 class="display-4"></h5>
						<h4>مجموع بدل :
					      
							 <?php 
								$ko_badal = $sum_dain8+$sum_dain9;
							echo number_format($ko_badal).'$';
						?></h4>
                        </div>
                    </div>
                </div>
			
					
			
		
	</div>
</div>



<div class="col-xlg-12 col-lg-12 col-md-12 col-sm-12">
		 <div class="row mb-3">
				<div class="col-xl-3 col-lg-3 col-md-3  col-sm-6 col-xs-6 py-6 text-center mt-1">
                    <div class="card bg-success text-white h-100">
					
                        <div class="card-body bg-success">
						<h5 class="display-4"></h5>
						<h4>مقدمە :
					      
							 <?php 
						  
							$stmt1 = $conn->prepare("SELECT sum(Madin)As sum_madin FROM data_entry_02_main WHERE House_ID = '$house_id' AND Vou_ID = 16");     
							$stmt1->execute();
							$result = $stmt1->get_result();
							if ($result->num_rows > 0) 
							{
								while ($row = $result->fetch_assoc())
								{
									$sum_dain10 = $row['sum_madin'];
								
								echo number_format($sum_dain10).'$';
								}
							}
							$stmt1->close();
						?></h4>
                        </div>
                    </div>
               </div>
         </div>
</div>







<div class="col-xlg-12 col-lg-12 col-md-12 col-sm-12">
		 <div class="row mb-3">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 py-12 text-center mt-1">
							<div class="card bg-danger text-white h-100">
					
                        <div class="card-body bg-danger">
						<h5 class="display-4"></h5>
						<h2>مبلغ القرض المطلوب :
					      
							 <?php 
						  
							echo number_format($kwlfa-$ko_maqbwzat-$ko_badal).'$';
						?> </h2>
                        </div>
                    </div>
                </div>
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