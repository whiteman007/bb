<?php

$txtVals = array(
"login"=>'چوونە ژورەوە',
"loginform"=>'فۆرمی چوونە ژورەوە',
"username"=>'ناوی بەکارهێنەر',
"password"=>'ووشەی تێپەر',
"logout"=>'چوونەدەرەوە‌',
"logininvalid"=>'ناوی بەکرهێنەر یاخود ووشەی تێپەر هەڵەیە‌',
"insertusername"=>'ناوی بەکارهێنەر و ووشەی تێپەربنووسە‌',
"housecode"=>'کۆدی خانووبەرە',
"logedin"=>'ئێوە لە ژوورەوەن لە ژێرناوی :',
"fdate"=>'یەکەم بەروار',
"sdate"=>'دووەم بەروار',
"Document_No"=>'ژمارەی دۆکیومێنت',
"Discount"=>'داشکاندن',
"Madin_Paid"=>'بری دراوی قەرز',
"Madin"=>'مەدین(بری قەرز)',
"Dain"=>'دایین',
"Description"=>'تێبینی',
"titleW"=>'سیستەمی فرۆشتنی خانووبەرە',
"users"=>'بەکارهێنەرەکان',
"houses"=>'خانووبەرەکان',
"inserthouse"=>'زیادکردنی خانووبەرە',
"edit"=>'گۆرانکاری',
"delete"=>'لابردن',
"addnewuser"=>'زیادکردنی بەکارهێنەری نوێ',
"areyousuredelete"=>'دڵنیایت لە رەشکردنەوەی ',
"yes"=>'بەڵێ',
"cancel"=>'گەڕانەوە',
"quest"=>'؟',
"userdeleted"=>'بەکارهێنەرەکە رەشکرایەوە لە سیستەمەکە',
"usernotdeleted"=>'هەڵەیە، بەکارهێنەرەکە رەشنەکراوە لە سیستەمەکە!',
"selecteuserrole"=>'ڕۆلی بەکارهێنەرهەڵبژێرە',
"admin"=>'بەروێوەبەر',
"owner"=>'خاوەن',
"engineer"=>'ئەندازیار',
"repeatpassword"=>'دووبارەبووەی ووشەی تێپەر',
"add"=>'زیادکردن',
"edituser"=>'گۆرانکاری لە بەکارهێنەر',
"update"=>'گۆڕانکاری',
"houseid"=>'کۆدی خانووبەرە',
"houseowner"=>'خاوەنی خانووبەرە',
	
"buildingtype"=>'تاوەر/جۆر',
"floor_block"=>'تابق/بلۆک',
"organization"=>'لەلایەن',
"propetiescode"=>'کۆدی ملک',
"apartment"=>'شوقە',
"villa"=>'ڤێلا',
"landarea"=>'روبەری زەوی',
"buildingarea"=>'رووبەری بینایە',
"abandoned"=>'رووبەری مەتروکە',
"extraarea"=>'رووبەری زیادە',
"price"=>'نرخ',
"submit"=>'ناردن',
"newhouseadded"=>'خانووبەرەکە بەسەرکەوتووی زیادکرا',
"newhousenotadded"=>'هەڵەیە، خانووبەرەکە زیادنەکرا!',
"pleasetypebuilfing1"=>'تکایە جۆری خانووبەرە هەڵبژێرە',
"pleasetypebuilfing2"=>'تکایە زانیاری لەسەر تابق و بلۆک نووسە',
"pleasetypebuilfing3"=>'تکایە کۆدی خانووبەرە بنووسە',
"pleasetypebuilfing4"=>'تکایە زانیاری لەسەر لایەنی پەیوەندیدار بنووسە',
"pleasetypebuilfing5"=>'تکایە جۆری خانووبەرە هەڵبژێرە(ڤێلا یاخود شوقە)',
"pleasetypebuilfing6"=>'تکایە رووبەری زەوی دیاری بکە',
"pleasetypebuilfing7"=>'تکایە رووبەری خانووبەرەکە دیاری بکە',
"pleasetypebuilfing8"=>'تکایە رووبەری مەترکە دایری بکە',
"pleasetypebuilfing9"=>'تکایە رووبەری زیادەی زەوی دایری بکە',
"pleasetypebuilfing1"=>'تکایە نرخەکە دایری بکە',
"warningTitle"=>'چوار چرا بۆ خزمەتگۆزاری فرۆشتنی خانووبەرە',
"warningMessage"=>'تکایە سەردانی هەژمارەکەت بکە بۆ بینینی پێدانی قستەکان',

);
$sql = "SELECT * FROM languagewords";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
		$txtVals[$row['word_en']]=$row['word_ku'];
	}
}
?>