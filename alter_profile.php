<?php
include "db.php";
session_start();

if (isset($_SESSION['user_data'])) {
        $row = $_SESSION['user_data'];
        $userid = $row['id'];
} 
else {
        echo 'User data not found.';
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $newUsername = isset($_GET["new_username"]) ? trim($_GET["new_username"]) : '';
    $newPassword = isset($_GET["new_password"]) ? trim($_GET["new_password"]) : '';
    $newEmail = isset($_GET["new_email"]) ? trim($_GET["new_email"]) : '';
    if (empty($newUsername) || empty($newPassword) || empty($newEmail)) {
        echo "Please fill in all fields.";
        exit;
    }

    if ($userid==2) {
        echo("No data changing on guest account!");
    }
    else{
    $updateQuery = "UPDATE tbl_220_users_test SET username = '$newUsername', password = '$newPassword', email = '$newEmail' WHERE id = $userid";

    if ($connection->query($updateQuery) === TRUE) {
        echo "User data updated successfully.";
        $newDataQuery = "SELECT * FROM tbl_220_users_test WHERE id = $userid";
        $new_result = mysqli_query($connection,$newDataQuery);
        $row = mysqli_fetch_array($new_result);
        $_SESSION['user_data'] = $row;

    } else {
        echo "Error updating user data: ";
    }
    }
    header('Location: ' . URL . 'profile.php');

}
?>