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
if (isset($_GET['new_event_id'])){
        $event_get_id= $_GET['new_event_id'];
    }
    else {
        die('Event ID not found!');
    }
    $events_data_query  = "SELECT * FROM tbl_220_events_test WHERE id=$event_get_id";
    $result = mysqli_query($connection,$events_data_query);
    if ($row = mysqli_fetch_assoc($result)){
            $error_events = 0;
            $new_name = $_GET['new_event_name'];
            $new_date = $_GET['new_event_date'];
            $new_location = $_GET['new_event_location'];
            $new_participants = $_GET['new_event_participants'];
            $new_activity = $_GET['new_event_activity'];
            $update_query="UPDATE tbl_220_events_test SET e_name='$new_name' WHERE id=$event_get_id";
            $result = mysqli_query($connection,$update_query);
            $update_query="UPDATE tbl_220_events_test SET e_date='$new_date' WHERE id=$event_get_id";
            $result = mysqli_query($connection,$update_query);
            $update_query="UPDATE tbl_220_events_test SET location='$new_location' WHERE id=$event_get_id";
            $result = mysqli_query($connection,$update_query);
            $update_query="UPDATE tbl_220_events_test SET participants=$new_participants WHERE id=$event_get_id";
            $result = mysqli_query($connection,$update_query);
            $update_query="UPDATE tbl_220_events_test SET activity='$new_activity' WHERE id=$event_get_id";
            $result = mysqli_query($connection,$update_query);
    }
    else {
            $error_events = 1;
            echo "ERROR: Events Data not found!\n";
    }
    header('Location: ' . URL . 'event-page.php?id=' . $event_get_id);
?>