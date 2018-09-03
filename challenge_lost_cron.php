<?php
include("php/setup.php");
$conn = new mysqli($host, $user, $pass, $database);

$sql = 'SELECT challenge_id, accepted_user_id, end_at, is_approved,	active from accepted_challenges';

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
		 $current = new DateTime('now');
            $current_time = $current->format('Y-m-d H:i:s');
            if (($current_time > $row["end_at"])&&($row["is_approved"] == 0)) {
				
				 
				 $get_created_user = ORM::for_table('user_challenges')->where('challenge_id', $row["challenge_id"])->find_one();
				 $created_user = $get_created_user->creator_user_id;
				 
				$update_points = ORM::for_table('user_points')->where('user_id', $created_user)->find_one();
				$update_points->points -= $get_created_user->points;
				$update_points->save();
				
				$update_points = ORM::for_table('user_points')->where('user_id', $row["accepted_user_id"])->find_one();
				$update_points->points += $get_created_user->points;
				$update_points->save();
				/*
				$update_activeness = ORM::for_table('accepted_challenges')->where('challenge_id', $row["challenge_id"])->find_one();
				$update_activeness->active = 0;
				$update_activeness->save();
				*/
				echo "done";
				
			}
		
    }
} else {
    echo "no_results";
}
$conn->close();
?>