<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $rating = $_POST['rating'];

  echo 'Rating received: ' . $rating;
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="star.css">
</head>
<body>
  <div class="rating" id="rating">
    <a href="#" data-rate="5">&#9733;</a>
    <a href="#" data-rate="4">&#9733;</a>
    <a href="#" data-rate="3">&#9733;</a>
    <a href="#" data-rate="2">&#9733;</a>
    <a href="#" data-rate="1">&#9733;</a>
  </div>

  <script src="script.js"></script>
</body>
</html>