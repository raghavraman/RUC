<?php
include("php".DIRECTORY_SEPARATOR."setup.php");
	
//user email list

$mysqli = new mysqli($host, $user, $pass, $database);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$sql = "Select email from users";
$result = $mysqli->query($sql);
$email_list_array = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		array_push($email_list_array,$row['email']);
    }
} else {
    echo "0 results";
}
$mysqli->close();

//vars
date_default_timezone_set("America/New_York");
$date = date('Y-m-d',strtotime("-2 days"));
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
$msg = "RUC updates for yesterday if you missed it!\n".$new_posts." new updates on posts.\n".$new_challenges." new challenges.\n".$new_users." new users joined RUC.\n"
		.$new_cms." users helped out the community.\n
		Go check them out on RUC!.\nhttps://www.atown.dreamhosters.com/ruc/home.php";

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

//$email_list = implode (", ", $email_list_array);
// send email
mail("harshvardhanpoojary@gmail.com","RUC Updates!",$msg);
//echo $email_list; */
echo "Posts:".$new_posts;
echo "Challenges".$new_challenges;
echo "Users:".$new_users;
echo "CMS:".$new_cms;
echo "Date:".$date;
echo "Message:".$msg;
?>
