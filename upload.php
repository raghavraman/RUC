<?php
session_start();
include "php/setup.php";

$uploadOk = 1;
$type = $_POST['type'];

if($type != "text")
{
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
}

if($type != "text")
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if file already exists
if($type != "text")
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
	header('location: home.php?error=fileexists');
    $uploadOk = 0;
}
// Check file size
if($type != "text")
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    header('location: home.php?error=sizeexceeds');
    $uploadOk = 0;
}
// Allow certain file formats

switch($type){
	case "video":
		if($FileType != "mp4" && $FileType != "3gp" && $FileType != "avi" && $FileType != "wmv" && $FileType != "m4v" && $FileType != "mov" ) {
			header('location: home.php?error=wrongfiletype');
			$uploadOk = 0;
		}
		break;
	case "audio":
		if($FileType != "mp3" && $FileType != "wav") {
			header('location: home.php?error=wrongfiletype');
			$uploadOk = 0;
		}
		break;
	case "image":
		if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg" && $FileType != "gif" && $FileType != "jpeg") {
			header('location: home.php?error=wrongfiletype');
			$uploadOk = 0;
		}
		break;		
	case "text":
		break;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

} else {
	// if everything is ok, try to upload file
	if($type != "text")
	$newname = time() .rand(100000,50000);

    if((move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir .$newname .".".$FileType))&&($type != "text")) {
		
		$desc = $_POST["desc"];
		$user_id = $_SESSION["user_id"];
		$post = ORM::for_table('posts')->create();
		$post->user_id = $user_id;
		$post->file_type = $type;
		$post->desc_text = $desc;
		$post->resource_url = $newname.".".$FileType;
		$post->save();
		
$sql = "SELECT count(post_id) as count_posts from posts where user_id = '$user_id'";
		$conn = new mysqli($host, $user, $pass, $database);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				//echo $row["count_posts"];
				$total_posts = $row["count_posts"];
				if((($total_posts % 5) == 0)||($total_posts == 1))
				{
					$get_points = ORM::for_table('user_points')->where('user_id', $user_id)->find_one();
					$get_points->points = $get_points->points + 5;
					$get_points->save();
				}
				
			}
		} else {
			echo "0 results";
		}
			
			
		
		
		
		
		
		
		
		
		
		
		
		header('location: home.php');
    } else {
		if($type == "text")
		{
			$desc = $_POST["desc"];
            $user_id = $_SESSION["user_id"];
			$post = ORM::for_table('posts')->create();
			$post->user_id = $user_id;
			$post->file_type = text;
			$post->desc_text = $desc;
			$post->resource_url = NULL;
			$post->save();
			
			
		$sql = "SELECT count(post_id) as count_posts from posts where user_id = '$user_id'";
		$conn = new mysqli($host, $user, $pass, $database);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				//echo $row["count_posts"];
				$total_posts = $row["count_posts"];
				if((($total_posts % 5) == 0)||($total_posts == 1))
				{
					$get_points = ORM::for_table('user_points')->where('user_id', $user_id)->find_one();
					$get_points->points = $get_points->points + 5;
					$get_points->save();
				}
				
			}
		} else {
			echo "0 results";
		}
			
			
			header('location: home.php');
		}
		else
        header('location: home.php?error=failed');
    }
}
?>