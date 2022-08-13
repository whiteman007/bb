<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
//ob_start();
//session_start();

    if(isset($_GET['lang']) && ($_GET['lang'] == 'ku' || $_GET['lang'] == 'ar' || $_GET['lang'] == 'en')){
	$_SESSION['lang'] = $_GET['lang'];
    }
    
    if(isset($_SESSION['lang']))
        require_once("includes/lang/lang_".$_SESSION['lang'].".php");
    else
        require_once("includes/lang/lang_ku.php");
?>
<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title><?php echo $txtVals["titleW"]; ?></title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/radio-button.css" rel="stylesheet" type="text/css" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<link rel="icon" href="favicon.ico" type="image/x-icon" />


        <script>
        function loadStyleSheet( path, cssId, types) 
        {
            var head  = document.getElementsByTagName('head')[0];
            var link  = document.createElement('link');
            if (!document.getElementById(cssId))
            {
                link.id   = cssId;
                link.rel  = 'stylesheet';
                link.href = path;
                link.type =types;
                head.appendChild(link);
            }
            else
            {
                if(cssId=="rltId")
                {
                    link.id   = "ltrId";
                    head.removeChild(link);
                }
                else
                {
                    link.id   = "rtlId";
                    head.removeChild(link);
                }
                if(cssId=="rltIdth")
                {
                    link.id   = "ltrIdth";
                    head.removeChild(link);
                }
                else
                {
                    link.id   = "rtlIdth";
                    head.removeChild(link);
                }
                if (cssId=="mainID")
                {
                    link.id   = cssId;
                    link.rel  = 'stylesheet';
                    link.href = path;
                              link.type =types;
                    head.appendChild(link);
                }
            }
            return true
            
        }
		</script>
		<link rel="stylesheet" href="designMaterials/dataTables/datatables.min.css">
    
  <!-- Include Date Range Picker -->
		<script src="designMaterials/bootstrap_datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
		<link rel="stylesheet" href="designMaterials/bootstrap_datetimepicker/css/bootstrap-datetimepicker.min.css">   
    <link rel="stylesheet" href="designMaterials/material-design-icons-master/css/material-icons.min.css">
    <link rel="stylesheet" href="designMaterials/material-design-icons-master/css/material-icons.css">

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" sizes="16x16">
    
    <script src="scripts/main.js"></script>
    
    <!--[if lt IE 9]>
	  <script src="../designMaterials/HTML5Shiv/"></script>
    <![endif]-->
    
    <?php
        $pageName = basename($_SERVER['PHP_SELF']);
    ?>
        
    <script>
         var layout = {};
        layout.setDirection = function (direction) {
            layout.rtl = (direction === 'rtl');
            document.getElementsByTagName("html")[0].style.direction = direction;
            var styleSheets = document.styleSheets;
            var modifyRule = function (rule) {
                if (rule.style.getPropertyValue(layout.rtl ? 'left' : 'right') && rule.selectorText.match(/\.col-(xs|sm|md|lg)-push-\d\d*/)) {
                    rule.style.setProperty((layout.rtl ? 'right' : 'left'), rule.style.getPropertyValue((layout.rtl ? 'left' : 'right')));
                    rule.style.removeProperty((layout.rtl ? 'left' : 'right'));
                }
                if (rule.style.getPropertyValue(layout.rtl ? 'right' : 'left') && rule.selectorText.match(/\.col-(xs|sm|md|lg)-pull-\d\d*/)) {
                    rule.style.setProperty((layout.rtl ? 'left' : 'right'), rule.style.getPropertyValue((layout.rtl ? 'right' : 'left')));
                    rule.style.removeProperty((layout.rtl ? 'right' : 'left'));
                }
                if (rule.style.getPropertyValue(layout.rtl ? 'margin-left' : 'margin-right') && rule.selectorText.match(/\.col-(xs|sm|md|lg)-offset-\d\d*/)) {
                    rule.style.setProperty((layout.rtl ? 'margin-right' : 'margin-left'), rule.style.getPropertyValue((layout.rtl ? 'margin-left' : 'margin-right')));
                    rule.style.removeProperty((layout.rtl ? 'margin-left' : 'margin-right'));
                }
                if (rule.style.getPropertyValue('float') && rule.selectorText.match(/\.col-(xs|sm|md|lg)-\d\d*/)) {
                    rule.style.setProperty('float', (layout.rtl ? 'right' : 'left'));
                }
            };
            try {
                for (var i = 0; i < styleSheets.length; i++) {
                    var rules = styleSheets[i].cssRules || styleSheets[i].rules;
                    if (rules) {
                        for (var j = 0; j < rules.length; j++) {
                            if (rules[j].type === 4) {
                                var mediaRules = rules[j].cssRules || rules[j].rules
                                for (var y = 0; y < mediaRules.length; y++) {
                                    modifyRule(mediaRules[y]);
                                }
                            }
                            if (rules[j].type === 1) {
                                modifyRule(rules[j]);
                            }

                        }
                    }
                }
            } catch (e) {
                // Firefox might throw a SecurityError exception but it will work
                if (e.name !== 'SecurityError') {
                    throw e;
                }
            }
        }
        </script>
        <?php
            if (!isset($_SESSION['lang']))
            {
              $_SESSION['lang'] = 'ku';
              ?>
            <script>
            
                loadStyleSheet( 'designMaterials/bootstrap/css/bootstrap.theme.min.css','rtlIdth', 'text/css' );
                loadStyleSheet( 'https://cdn.rtlcss.com/bootstrap/3.3.7/css/bootstrap.min.css','rtlId', 'text/css' );
                loadStyleSheet( 'styles/main.css','mainID', 'text/css')
                layout.setDirection('rtl');
						
             </script>
								 
		<?php				}
            elseif( $_SESSION['lang'] == 'en' || $_SESSION['lang'] == 'de' || $_SESSION['lang'] == 'fr' || $_SESSION['lang'] == 'tr')
            {
             ?>
             <script>
                    loadStyleSheet( 'designMaterials/bootstrap/css/bootstrap.theme.min.css' ,'ltrIdth', 'text/css');
                    loadStyleSheet( 'designMaterials/bootstrap/css/bootstrap.min.css' ,'ltrId', 'text/css');
                    loadStyleSheet( 'styles/main.css','mainID', 'text/css');
                    layout.setDirection('ltr');
														
             </script>
             <?php
            }
            else
            {
              ?><script>
												
                    layout.setDirection('rtl');
                    loadStyleSheet( 'designMaterials/bootstrap/css/bootstrap.theme.min.css','rtlIdth', 'text/css' );
                    loadStyleSheet( 'https://cdn.rtlcss.com/bootstrap/3.3.7/css/bootstrap.min.css','rtlId', 'text/css');
                    loadStyleSheet( 'styles/main.css','mainID', 'text/css')
                    </script>
             <?php
            }
            ?>
						
	<link rel="stylesheet" href="styles/main.css" type="text/css">
        <style>
            <?php
                include 'styles/main.php';
            ?>
            </style>
            <style>
                
                /* for badge notification */
<?php
if($_SESSION['lang']=='en')
{
?>

    .badge {
  position: relative;
  top: -25px;
  left: -270px;
  padding: 5px 10px;
  border-radius: 50%;
  background: violet;
  color: #620d2b !Important;
}
<?php 
}
else
{
?>
   .badge {
  position: relative;
  top: -25px;
  right: 20px;
  padding: 5px 10px;
  border-radius: 50%;
  background: violet;
  color: #620d2b !Important;
 
 <?php
}
 ?>
            </style>
</head>
<body class="bodyPart">
        <a id="top"></a>
        <div class="well1 mt-3" >
            <?php
            echo "<div class='col-lg-12 col-md-12 col-sm-12 text-right lang_links text-center ' style='padding: 0px 0px 0px 0px; margin:0'>";

?>    

                <?php
                    if(isset($_SESSION['lang']))
                    {
                        switch ($_SESSION['lang'])
                        {
                            case 'en':
                ?>
                                        <a href='<?php echo $pageName; ?>?lang=ku'>کوردی</a><span class="link_Slash"> | </span>
                                        <a href='<?php echo $pageName; ?>?lang=ar'>عربی</a>
                    
                <?php
                                        break;
                            
                            case 'ar':
                ?>
                                        <a href='<?php echo $pageName; ?>?lang=ku'>کوردی</a><span class="link_Slash"> | </span>
                                        <a href='<?php echo $pageName; ?>?lang=en'>English</a>
                                      
                <?php
                                        break;
                            default :
                ?>
                                        <a href='<?php echo $pageName; ?>?lang=ar'>عربی</a> <span class="link_Slash"> | </span> 
                                        <a href='<?php echo $pageName; ?>?lang=en'>English</a> 
                                       
                <?php
                        }
                    }
                    else
                    {
                ?>
                                        <a href='<?php echo $pageName; ?>?lang=ar'>عربی</a> <span class="link_Slash"> | </span> 
                                        <a href='<?php echo $pageName; ?>?lang=en'>English</a>
                                        
                <?php
                    }
                    ?>

            </div>
        </div>
        <hr class="margin-bottom-sm margin-top-sm hidden-lg hidden-md hidden-sm" style="border: 1px #620d2b solid;">
        </div>



