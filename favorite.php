<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Favorite Images:</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body onload="FavImageGrid(<?php
      require_once('dbConnect.php');
	    if($conn == FALSE)
		die("Error connecting to mysql server :". mysqli_connect_error());
		$query = "SELECT * FROM `cat-images` WHERE `favorite` = 1";
    $result = mysqli_query($conn, $query);
		$categorys = array("Sad", "Happy", "Grumpy", "Cute", "Strong", "Abnormal", "Playing", "Food");
		$count = 0;
	    if($result)
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
	    else
		die("Error in database query");
	    mysqli_close($conn);
		while($count <= 9) {
					echo "'No Image Favorited";
					echo "', '";
					echo "Image Slot: ";
					echo $count;
					if ($count != 9){
						echo "', ";
					}
					else {
						echo "'";
					}
					$count++; }?>);">
    <script src="script.js"></script>
      <div class="container">
      </div>
    </body>
</html>
