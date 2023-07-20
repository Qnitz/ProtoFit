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
if (isset($_GET['rate_event_id']) and isset($_GET['rate_user_id'])){
        $event_get_id= $_GET['rate_event_id'];
        $user_get_id= $_GET['rate_user_id'];
    }
    else {
        die('Event or User ID not found!');
    }
    $events_data_query  = "SELECT * FROM tbl_220_events_test WHERE id=$event_get_id";
    $result = mysqli_query($connection,$events_data_query);
    if ($row = mysqli_fetch_assoc($result)){
        $error_events = 0;
        $event_check_query  = "SELECT * FROM tbl_220_ratings WHERE event_id=$event_get_id AND user_id=$user_get_id;";
        $result_check = mysqli_query($connection,$event_check_query);
        if (mysqli_num_rows($result_check) > 0) {
                $delete_query="DELETE FROM tbl_220_ratings WHERE event_id=$event_get_id AND user_id=$user_get_id;";
                $result_check = mysqli_query($connection,$delete_query);
        }
        $new_rating = $_GET['new_event_rating'];
        $event_current_rates_query  = "INSERT INTO tbl_220_ratings(event_id,user_id,score) VALUES ($event_get_id,$user_get_id,$new_rating);";
        $result2 = mysqli_query($connection,$event_current_rates_query);
        $updated_rating = 0;
        $event_rates_query  = "SELECT * FROM tbl_220_ratings WHERE event_id=$event_get_id";
        $result3 = mysqli_query($connection,$event_rates_query);
        if (mysqli_num_rows($result3) > 0) {
                $num_reviews = 0;
                while ($row = mysqli_fetch_assoc($result3)) {
                        $updated_rating = $updated_rating + $row['score'];
                        $num_reviews = $num_reviews+1;
                }
                $updated_rating = $updated_rating / $num_reviews;
        }
        else {
                $updated_rating="To be Rated by Participants";
        }
        $update_query="UPDATE tbl_220_events_test SET rating='$updated_rating' WHERE id=$event_get_id";
        $result = mysqli_query($connection,$update_query);
    }
    else {
            $error_events = 1;
            echo "ERROR: Events Data not found!\n";
    }
    header('Location: ' . URL . 'event-page.php?id=' . $event_get_id);
?>
