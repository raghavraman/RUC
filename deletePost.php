<?php

include("php".DIRECTORY_SEPARATOR."setup.php");

// Create connection
$mysqli = new mysqli($host, $user, $pass, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("DELETE FROM posts WHERE post_id = ? ");

$stmt->bind_param("i", $post_id);

$data = json_decode($_POST['post_info']);

$post_id = $data->post_id;
//$post_id = 181;

if (!$stmt->execute()) {
    header('location: home.php?error=SQLError');
    die($response);
}else{
    $stmt->close();

    $stmt = $mysqli->prepare("DELETE FROM post_reactions WHERE post_id = ? ");

    $stmt->bind_param("i", $post_id);

    if (!$stmt->execute()) {
        header('location: home.php?error=SQLError');
        die($response);
    }else{
        $stmt->close();

        header('location: home.php?error=success');
    }
}
$mysqli->close();