<?php

$txtVals = array(
"login"=>'Login',
"loginform"=>'Login Form',
"username"=>'User Name',
"password"=>'Password',
"login"=>'Login',
"logout"=>'Sign Out‌',
"logininvalid"=>"Username or Password is invalid!",
"insertusername"=>"Username or Password is empty",
"housecode"=>'House Code',
"logedin"=>'You loged in as:',
"fdate"=>'First Date',
"sdate"=>'Second Date',
"Document_No"=>'Document No.',
"Discount"=>'Discount',
"Madin_Paid"=>'Madin_Paid',
"Madin"=>'Madin',
"Dain"=>'Dain',
"Description"=>'Description',
"titleW"=>'Hosuse Sale System',
"users"=>'Users',
"houses"=>'Houses',
"inserthouse"=>'Insert House',
"edit"=>'Edit',
"delete"=>'Delete',
"addnewuser"=>'Add New User',
"areyousuredelete"=>'Are you sure to delete',
"yes"=>'Yes',
"cancel"=>'Cancel',
"quest"=>'?',
"userdeleted"=>'The user deleted',
"usernotdeleted"=>'Error, the user could not be deleted!',
"selecteuserrole"=>'Select User Role',
"admin"=>'Admin',
"owner"=>'Owner',
"engineer"=>'Engineer',
"repeatpassword"=>'Confirm Password',
"add"=>'Add',
"edituser"=>'Edit the user',
"update"=>'Update',
"houseid"=>'House ID',
"houseowner"=>'House Owner',
	
"buildingtype"=>'Building/Type',
"floor_block"=>'Floor/Block',
"organization"=>'Organization',
"propetiescode"=>'Propeties Code',
"apartment"=>'Apartment',
"villa"=>'Villa',
"landarea"=>'Land Area',
"buildingarea"=>'Building Area',
"abandoned"=>'Abandoned Area',
"extraarea"=>'Extra Area',
"price"=>'Price',
"submit"=>'Submit',
"newhouseadded"=>'The new house has been added, successfully',
"newhousenotadded"=>'The new house could not be added!',
"pleasetypebuilfing1"=>'Please write the type of building',
"pleasetypebuilfing2"=>'Please write the floor and block information>',
"pleasetypebuilfing3"=>'Please write the code of properties',
"pleasetypebuilfing4"=>'Please write the side/organization information',
"pleasetypebuilfing5"=>'Please choose the type of building',
"pleasetypebuilfing6"=>'Please specify the area of the land',
"pleasetypebuilfing7"=>'Please specify the area of the building',
"pleasetypebuilfing8"=>'Please specify the area of the matrwka',
"pleasetypebuilfing9"=>'Please specify the area of the extra land',
"pleasetypebuilfing1"=>'Please specify the price',
"warningTitle"=>'NCC House Saling Sevice',
"warningMessage"=>'Please visit your account to see how the installment payment is',

);
$sql = "SELECT * FROM languagewords";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
		$txtVals[$row['word_en']]=$row['word_en'];
	}
}
?>