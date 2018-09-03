<?php
include "php/setup.php";
session_start();
$user_id      = $_SESSION['user_id'];
$obj          = json_decode($_POST['challenge_info']);
$challenge_id = $obj->challengeId;

$conn2 = new mysqli($host, $user, $pass, $database);

if ($conn2->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$get_points = ORM::for_table('user_challenges')->where('challenge_id', $challenge_id)->find_one();
$points     = $get_points->points;

$sql    = "SELECT accepted_user_id,end_at,active from accepted_challenges where challenge_id = $challenge_id";
$result = $conn2->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {

        if (($row["active"] == 1)) {
            date_default_timezone_set("America/New_York");
            $current = new DateTime('now');
            $current_time = $current->format('Y-m-d H:i:s');
            //echo $row["end_at"];
            //$challenge_date = new DateTime($row["end_at"]);
            //echo new DateTime($row["end_at"]);

            if ($current_time < $row["end_at"]) {
                $conn = new mysqli($host, $user, $pass, $database);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $accept = $row["accepted_user_id"];

                $sql = "UPDATE user_points SET points = points - $points where user_id = $accept";

                if ($conn->query($sql) === TRUE) {


                    $conn1 = new mysqli($host, $user, $pass, $database);

                    if ($conn1->connect_error) {
                        die("Connection failed: " . $conn1->connect_error);
                    }
                    //$accept = $row["accepted_user_id"];
                    $sql    = "UPDATE user_points SET points = points + $points where user_id = $user_id";

                    if ($conn1->query($sql) === TRUE) {

                        $conn4 = new mysqli($host, $user, $pass, $database);

                        if ($conn4->connect_error) {
                            die("Connection failed: " . $conn4->connect_error);
                        }
                        $sql = "UPDATE accepted_challenges SET active = 0,is_approved = 1 where challenge_id = $challenge_id";

                        if ($conn4->query($sql) === TRUE) {

                            // header('Location: approvechallenge.php?message=success');
                            //echo 'successfull';

                            $approved_query = ORM::for_table('users')->where('user_id', $accept)->find_one();
                            $current_user = ORM::for_table('users')->where('user_id', $user_id)->find_one();

                            $challenge_success_post = ORM::for_table('posts')->create();
                            $challenge_success_post->user_id = $user_id;
                            $challenge_success_post->desc_text = $approved_query->user_name ." just lost a challenge posted by me";
                            $challenge_success_post->file_type = 'text';
                            $challenge_success_post->resource_url = NULL;
                            $challenge_success_post->save();

                            $response = array(
                                'result_code' => 200,
                                'result_message' => 'success',
                                'result' => 'success'
                            );
                            $response = json_encode($response);
                            echo $response;
                        }
                    } else {
                        // header('Location: approvechallenge.php?message=failed');
                        $response = array(
                            'result_code' => 400,
                            'result_message' => 'points_increment_failed',
                            'result' => 'unsuccess'
                        );
                        $response = json_encode($response);
                        echo $response;
                    }
                    $conn1->close();
                } else {
                    // header('Location: approvechallenge.php?message=failed');
                    $response = array(
                        'result_code' => 400,
                        'result_message' => 'points_decrement_failed',
                        'result' => 'unsuccess'
                    );
                    $response = json_encode($response);
                    echo $response;
                }
                $conn->close();


            } else {
                $response = array(
                    'result_code' => 400,
                    'result_message' => 'challenge_expired',
                    'result' => 'unsuccess'
                );
                $response = json_encode($response);
                echo $response;
            }
        } else {
            // header('Location: approvechallenge.php?message=failed');
            $response = array(
                'result_code' => 400,
                'result_message' => 'challenge_inactive',
                'result' => 'unsuccess'
            );
            $response = json_encode($response);
            echo $response;
        }
    }

} else {
    // header('Location: approvechallenge.php?message=failed');
    $response = array(
        'result_code' => 400,
        'result_message' => 'no_such_challenge',
        'result' => 'unsuccess'
    );
    $response = json_encode($response);
    echo $response;
}

?>