<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cat Images:</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>


    <body onload="NewImageGrid(<?php
	    require_once('dbConnect.php');
	    if($conn == FALSE)
		die("Error connecting to mysql server :". mysqli_connect_error());
		if($_POST){
			$favoriteOption = "0";
			$query = "UPDATE `cat-images` SET `category` = '".$_POST['category']."', `comment` = '".$_POST['comment']."', `rating` = '".$_POST['rating']."', `favorite` = ".$_POST['favorite']." WHERE `filename`='".$_POST['filename']."';";
	    $result = mysqli_query($conn, $query);
		}

		$query = "SELECT * FROM `cat-images` where `favorite` = 0 ORDER BY RAND()";
    $result = mysqli_query($conn, $query);
		$categorys = array("Sad", "Happy", "Grumpy", "Cute", "Strong", "Abnormal", "Playing", "Food");
		$count = 0;
    if($result) {
      while($row = mysqli_fetch_assoc($result))
      {
        if ($count <= 9){
          echo "'http://localhost/myImages/";
          echo $row['filename'];
          echo "', '";
          $label =  $row['category'];
          echo $categorys[$label];
          if ($count != 9){
            echo "', ";
          }
          else {
            echo "'";
          }
          $count++;
        }
      }
    }
    else {
  		die("Error in database query");
    }
	    mysqli_close($conn); ?>);">
      <script src="script.js"></script>
      <div class="container">
      </div>
    </body>
</html>
