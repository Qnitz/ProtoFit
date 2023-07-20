<?php
include "db.php";
include "event.php";
session_start();
if (isset($_SESSION['user_data'])) {
        $row = $_SESSION['user_data'];
        $userid = $row['id'];
        $username = $row['username'];
        $usergroup = $row['user_group'];
} 
else {
        echo 'User data not found.';
}
$new_name = $_GET['new_event_name'];
$new_date = $_GET['new_event_date'];
$new_location = $_GET['new_event_location'];
$new_participants = $_GET['new_event_participants'];
$new_activity = $_GET['new_event_activity'];
$update_query="INSERT INTO tbl_220_events_test(e_name,e_date,location,participants,rating,activity) values
('$new_name','$new_date','$new_location',$new_participants,'To be Rated by Participants','$new_activity');
";
$result = mysqli_query($connection,$update_query);
echo $result;
header('Location: ' . URL . 'eventlist.php');
?>