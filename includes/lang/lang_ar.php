<?php

$txtVals = array(
"login"=>'الدخول',
"loginform"=>'نموذج الدخول',
"username"=>'اسم المستخدم',
"password"=>'كلمه السر',
"login"=>'الدخول',
"logout"=>'خروج',
"logininvalid"=>"اسم المستخدم او كلمة المرور غير صحيحة!",
"insertusername"=>"اسم المستخدم أو كلمة المرور فارغة",
"housecode"=>'رمز المنزل',
"logedin"=>'قمت بتسجيل الدخول باسم:',
"fdate"=>'الموعد الاول',
"sdate"=>'التاريخ الثاني',
"Document_No"=>'رقم المستند',
"Discount"=>'خصم',
"Madin_Paid"=>'دفع - مدين',
"Madin"=>'مدين',
"Dain"=>'داين',
"Description"=>'وصف',
"titleW"=>'نظام بيع المنزل',
"users"=>'المستخدمين',
"houses"=>'منازل',
"inserthouse"=>'أدخل البيت',
"edit"=>'تعديل',
"delete"=>'حذف',
"addnewuser"=>'إضافة مستخدم جديد',
"areyousuredelete"=>'هل انت متأكد من الحذف',
"yes"=>'نعم',
"cancel"=>'الغاء',
"quest"=>'؟',
"userdeleted"=>'يتم حذف المستخدم',
"usernotdeleted"=>'خطأ ، لا يمكن حذف المستخدم!',
"selecteuserrole"=>'حدد دور المستخدم',
"admin"=>'مشرف',
"owner"=>'صاحب',
"engineer"=>'مهندس',
"repeatpassword"=>'تأكيد كلمة المرور',
"add"=>'إضافة',
"edituser"=>'تحديث معلومات المستخدم',
"update"=>'تحديث',
"houseid"=>'رمز المنزل',
"houseowner"=>'صاحب المنزل',
		
"buildingtype"=>'عمارة - النوع',
"floor_block"=>'طابق - بلوك',
"organization"=>'الجهة',
"propetiescode"=>'كود الملك',
"apartment"=>'شقة',
"villa"=>'ڤیلا',
"landarea"=>'مساح الأرض',
"buildingarea"=>'مساح البناء',
"abandoned"=>'مساح المتروكة',
"extraarea"=>'مساح الأضافية',
"price"=>'السعر',
"submit"=>'ارسال',
"newhouseadded"=>'تم إضافة المنزل الجديد بنجاح',
"newhousenotadded"=>'لا يمكن إضافة المنزل الجديد!',
"pleasetypebuilfing1"=>'يرجى كتابة نوع المبنى',
"pleasetypebuilfing2"=>'يرجى تحديد طابق / بلوك  المعلومات',
"pleasetypebuilfing3"=>'يرجى كتابة رمز المنزل',
"pleasetypebuilfing4"=>'يرجى كتابة معلومات الجهة / المنظمة',
"pleasetypebuilfing5"=>' (شقة \ ڤیلا يرجى اختيار نوع المبنى',
"pleasetypebuilfing6"=>'يرجى تحديد مساحة الأرض',
"pleasetypebuilfing7"=>'يرجى تحديد مساحة المبنى',
"pleasetypebuilfing8"=>'يرجى تحديد منطقة المتركة',
"pleasetypebuilfing9"=>'يرجى تحديد مساحة الأرض الإضافية',
"pleasetypebuilfing1"=>'يرجى تحديد السعر',
"warningTitle"=>'جوار جرا لبيع خدمة البيت',
"warningMessage"=>'يرجى زيارة حسابك لمعرفة كيفية الدفع بالتقسيط',

);
$sql = "SELECT * FROM languagewords";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
		$txtVals[$row['word_en']]=$row['word_ar'];
	}
}
?>