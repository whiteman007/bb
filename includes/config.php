<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');
// Firebase API Key
define('FIREBASE_API_KEY', 'AAAAiBoYG9w:APA91bElwUdL9GtTKd3QOcC49Lq8FyF0Q-pNgCLZiKPjNSW-ol3FbXSi3yAilD8pRpC0mpMv2vDbXHrRAjHuU_2RnToufajr4m5ipmAmBGNCNrru-at3UcMNcaEV5oZC256tTMOCcUU7');
DEFINE("ROOT_PATH", dirname( __FILE__ ) ."/" );

//database credentials
define('DBHOST','localhost');
define('DBUSER','khortech_root');
define('DBPASS','Pq7,XJB-aDfD');
define('DBNAME','khortech_en_shouse_ms');

//application address
define('DIR','www.ncc-services.com/');
define('SITEEMAIL','noreply@ncc-services.com');

include('classes/firebase.php');
include('classes/push.php');
$firebase = new Firebase();
$push = new Push();
//Create Mysqli connection
$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
// Check connection
if($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
} 
//echo "Connected successfully";
mysqli_set_charset($conn,"utf8");
    if(isset($_GET['lang']) && ($_GET['lang'] == 'ku' || $_GET['lang'] == 'ar' || $_GET['lang'] == 'en')){
	$_SESSION['lang'] = $_GET['lang'];
    }
    
    if(isset($_SESSION['lang']))
        require_once("lang/lang_".$_SESSION['lang'].".php");
    else
        require_once("lang/lang_ku.php");
function push_notification_users($conn, $usersID, $houseID, $date_note,$firebase,$push)
{
    $current_date= strtotime(date("Y-m-d h:i:s"));
    $date_n=strtotime($date_note);
    
    if( $current_date>$date_n)
        {
            $stmt = $conn->prepare("SELECT regId,username FROM users where ID = '$usersID' ");     
    		$stmt->execute();
    		$result = $stmt->get_result();
    		if ($result->num_rows > 0) 
    		{
    			while ($row = $result->fetch_assoc())
    			{
    				$regId = $row['regId'];
    				$username=$row['username'];
    			}
    		}
    		$stmt->close();
            // optional payload
            $payload = array();
            $payload['team'] = 'Ania';
            $payload['score'] = '5.6';
            // push type - single user / topic
            $push_type = "individual";
            // whether to include to image or not
            $title="New Notifications ".$username;
            $message='You have to pay amount of';
            $include_image = isset($_GET['include_image']) ? TRUE : FALSE;
            $push->setTitle($title);
            $push->setMessage($message);
            if ($include_image) {
                $push->setImage('https://api.androidhive.info/images/minion.jpg');
            } else {
                $push->setImage('');
            }
            $push->setIsBackground(TRUE);
            $push->setPayload($payload);
            $json = '';
            $response = '';
            $json = $push->getPush();
            $response = $firebase->send($regId, $json);

        }
}
?>