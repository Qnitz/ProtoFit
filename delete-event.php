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
if (isset($_GET['id'])){
        $event_get_id= $_GET['id'];
    }
    else {
        die('Event ID not found!');
    }
    $events_data_query  = "SELECT * FROM tbl_220_events_test WHERE id=$event_get_id";
    $result = mysqli_query($connection,$events_data_query);
    if ($row = mysqli_fetch_assoc($result)){
            $error_events = 0;
            $update_query="DELETE from tbl_220_events_test WHERE id=$event_get_id;";
            $result = mysqli_query($connection,$update_query);
            echo $result;
    }
    else {
            $error_events = 1;
            echo "ERROR: Events Data not found!\n";
    }
    header('Location: ' . URL . 'eventlist.php');
?>