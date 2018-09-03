<?php
include("php".DIRECTORY_SEPARATOR."setup.php");
require __DIR__ . '/includes/vendor/autoload.php';
use Twilio\Rest\Client;
	
//user phone list

$mysqli = new mysqli($host, $user, $pass, $database);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "SELECT `ph_no` FROM `users` WHERE `ph_no` IS NOT NULL";
$result = $mysqli->query($sql);
$phone_list_array = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		array_push($phone_list_array,$row['ph_no']);
    }
} else {
    echo "0 results";
}

$mysqli->close();

//vars
date_default_timezone_set("America/New_York");
$date = date('Y-m-d',strtotime("-8 days"));
$new_posts = array();
$new_challenges = '';
$new_users = '';
$new_cms = '';

//new posts

$conn = mysqli_connect($host, $user, $pass, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
$sql = "SELECT COUNT(*) AS newposts FROM posts WHERE DATE(updated_at) > '".$date."'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $new_posts = $row["newposts"];
    }
}
	else {
    echo "0 results";
}
}
$conn->close();

//new challenges
$conn = mysqli_connect($host, $user, $pass, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
$sql = "SELECT COUNT(*) as newchallenges FROM user_challenges WHERE DATE(created_at) > '".$date."'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $new_challenges = $row["newchallenges"];
    }
}
	else {
    echo "0 results";
}
}
$conn->close();


//new users

$conn = mysqli_connect($host, $user, $pass, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
$sql = "SELECT COUNT(*) AS newusers FROM users WHERE DATE(created_at) > '".$date."'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $new_users = $row["newusers"];
    }
}
	else {
    echo "0 results";
}
}
$conn->close();


//new cms

$conn = mysqli_connect($host, $user, $pass, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
$sql = "SELECT COUNT(DISTINCT (user_id)) AS newcms FROM community_help WHERE DATE(reported_at) > '".$date."'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $new_cms = $row["newcms"];
    }
}
	else {
    echo "0 results";
}
}
$conn->close();


// the message
$msg = "RUC updates for the past weel if you missed it!\n".$new_posts." new updates on posts.\n".$new_challenges." new challenges.\n".$new_users." new users joined RUC.\n".$new_cms." users helped out the community.\nGo check them out on RUC!.\nhttps://www.atown.dreamhosters.com/ruc/home.php";

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACcb3f693b5e9eca5b21e6562e73cb900d';
$auth_token = '20c568df656c9fb862fc99c4827b1a3a';

// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// The Twilio number you own with SMS capabilities
$twilio_number = "+14123282643";

$client = new Client($account_sid, $auth_token);

foreach ($phone_list_array as $one) {
    $client->messages->create(
    '+1'.$one,
    array(
        'from' => $twilio_number,
        'body' => $msg
    ));
 }
 ?>
