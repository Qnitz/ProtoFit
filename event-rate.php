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
            $event = new Event($row['id'], $row['e_name'], $row['e_date'], $row['location'],$row['participants'], $row['rating'], $row['activity']);
    }
    else {
            $error_events = 1;
            echo "ERROR: Events Data not found!\n";
    }
?>
<!DOCTYPE html>
<html>
	<head>
                <meta charset="utf-8">
                <title>ProtoFit - Update Event</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="css/style.css">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous">
                </script>
                <script src="js/scripts-form.js"></script>
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Grape+Nuts&family=Roboto&family=VT323&display=swap"rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=VT32&display=swap"rel="stylesheet"> 
        </head>
	<body>
        <header>
                <div class="top_button" id="top_btn_row">
                        <button onclick="location.href='#';">English</button>
                        <button onclick="location.href='#';">Navigation</button>
                        <button onclick="location.href='#';">Accessibility</button>
                        <button onclick="location.href='#';">Support</button>
                        <form action="logout.php" method="post">
                        <button>Logout</button>
                        </form>
                </div>
                <div class="header_avatar">
                        <h2>Hello, <?php echo $username; ?></h2>
                        <a href="./profile.php">
                        <img src="./images/avatar_<?php echo $userid; ?>.jpg" alt="Avatar" class="avatar">
                        </a>
                </div>
                <div class="header_content">
                        <a href="./eventlist.php" class="logo-link">
                        <img src="./images/logo.jpg" alt="Logo" class="logo">
                        </a>
                        <input type="text" class="form-control-bar" name="search_in_app" placeholder="&#x1F50E;&#xFE0E;Search in application">
                </div>
        </header>
        <div class="nav_top">
                <button onclick="location.href='#';" class="hamburger-menu">&#9776;</button>
                <div class = "button-row">
                        <button onclick="location.href='#';">Home</button>
                        <button onclick="location.href='#';">Calendar</button>
                        <button onclick="location.href='./eventlist.php';">Events</button>
                        <button onclick="location.href='#';">Social</button>
                        <button onclick="location.href='#';">Fitness</button>
                </div>  
        </div>
        <nav>
                <div class="breadcrumbs">
                <button onclick="location.href='#';">Home</button>
                <button onclick="location.href='./eventlist.php';">Events</button>
                <button onclick="location.href='#';">Update Event</button>
                </div>
        </nav>
        <main>
                <aside class="sidebar">
                        <button onclick="location.href='./eventlist.php';" class="aside_button">Back To List</button> 
                </aside>
                <section class="main-section">
                <h1>Rate Event</h1>
                <form action="./rate-event.php" method="get" autocomplete="on">
                <input type="text" name="rate_event_id" class="form-control" value ="<?php echo $event->id;?>" hidden="true">
                <input type="text" name="rate_user_id" class="form-control" value="<?php echo $userid;?>" hidden="true">
                <label>How many stars out of 5?</label>
                <br><br>
                        <label>5<input type="radio" name="new_event_rating" value ="5"></label><br>
                        <label>4<input type="radio" name="new_event_rating" value ="4"></label><br>
                        <label>3<input type="radio" name="new_event_rating" value ="3"></label><br>
                        <label>2<input type="radio" name="new_event_rating" value ="2"></label><br>
                        <label>1<input type="radio" name="new_event_rating" value ="1"></label>
                </label>
                <br><br>
                <label>If you've previously rated this event, your previous rating will be overwritten by this one</label>
                <br><br>
                <input type="submit"  class="form-control-bar" id="form_submit_btn" value="Submit Event Rate">               
        </form>
        </section>
        </main>
        <footer>
        </footer>
	</body>
</html>
