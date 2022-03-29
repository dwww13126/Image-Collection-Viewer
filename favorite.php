<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Favorite Images:</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body onload="ImageGrid(<?php
      require_once('dbConnect.php');
	    if($conn == FALSE)
		die("Error connecting to mysql server :". mysqli_connect_error());
		$query = "SELECT * FROM `cat-images`";
	    $result = mysqli_query($conn, $query);
		$count = 0;
	    if($result)
			while($row = mysqli_fetch_assoc($result))
			{
				if (($row['favorite'] == 1)&&($count <= 9)){
					echo "'http://localhost/myImages/";
					echo $row['filename'];
					echo "', '";
					echo $row['category'];

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
      <script>
        //Is a function which takes in a array of images to create
        //a 3 by 3 grid of images.
        function ImageGrid(array) {
          //Is used to be able to store the url of the current image from the array
          //which needs to be added to the ImageGrid
          var currentImageURL = "";
          //Stores the length of the passed in array so that the script knows how many
          //photos it needs to add to the grid (Any other spots will be drawn with blank
          //squares to make up the 9 total spaces)
          var numImages = arguments.length;
          //Is used to be able to count the number of ellements which have been
          //drawn in the grid so that it can compare it to the number of images that
          //still need to be drawn so that it does not reference array values which
          //do not exist in the passed in array of image urls
          var currentDrawn = 0;
          //Gets the body ellement from the HTML document
          var body = document.getElementsByTagName("body")[0]
          //Creates a new table ellement
          var table = document.createElement("table");
          //For each column in the table
          for (var row = 1; row <= 3; row++) {
            //Creates a table row for the table data to be added to
            var tableRow = document.createElement("tr");
            //For each of the column in the current row
            for (var col = 1; col <= 3; col++){
              //Creates a table data ellement for the pictures to be added to
              var tableData = document.createElement("td");
              tableData.style.border="solid";
              //Performs a check to see if there are still more
              //photos which can be drawn or if there need
              //to be a blank square drawn instead of an image
              if (currentDrawn < numImages){
                //Sets the value of the currentImageURL to be the index of the image
                //from the array which needs to be added to the image
                currentImageURL = arguments[currentDrawn]
                //Creates a "a" ellement for which the photo needs to be added to
                var link = document.createElement("a");

                //Creates a image ellement for which the photo needs to be added to
                var image = document.createElement("img");
                //Creates a p ellement for adding the category to
                var comment = document.createElement("p");
                //Sets the height and width properties of the image so it
                //fits inside the grid properly
                var screenw = screen.width / 3;
                image.style.height= screenw - 30 + "px";
                image.style.width= screenw - 30 + "px";
                image.style.border="solid";
                //Sets the src property of the image to be the current image url
                image.setAttribute("src", currentImageURL+".png");
                var imageName = currentImageURL.replace('http://localhost/myImages/', '');
                //Sets the alt property of the image to be the current image url
                image.setAttribute("alt", imageName);
                comment.innerHTML = arguments[currentDrawn + 1];
                //Add the image to the current table data
                link.href = "information.php?image=" + imageName;
                if (arguments[currentDrawn] != "No Image Favorited") {
                  link.appendChild(image);
                  tableData.appendChild(link);
                }
                else{
                  tableData.appendChild(image);
                }
                tableData.appendChild(comment);
              }
              //If all images have been drawn from the array then draw a blank square
              //to make up the position in the grid
              else {
                //Creates a div which is formated to be a 100 by 100 square
                var square = document.createElement("div");
                //Sets the height and width properties of the square so it
                //fits inside the grid properly and sets up a border.
                image.style.height="355px";
                image.style.width="355px";
                square.style.border="solid";
                //Add the square to the current table data
                tableData.appendChild(square);
              }
              //Adds the square to the current row
              tableRow.appendChild(tableData);
              //Adds one to the the currentDrawn count
              //to the current drawn
              currentDrawn = currentDrawn + 2;
            }
            //Appends the row to the table
            table.appendChild(tableRow);
          }
          //Creates the buttons used to be able to reload a different set of images
          var browsePhotos = document.createElement("button");
          //Creates the buttons used to be able to go to the favorited images
          var statsButton = document.createElement("button");
          browsePhotos.innerHTML = "Browse Photos:";
          statsButton.innerHTML = "Photos Stats:";
          statsButton.className = "statsButton";
          browsePhotos.className = "browsePhotos";
          statsButton.setAttribute("onclick", "location.href='stats.php'");
          browsePhotos.setAttribute("onclick", "location.href='index.php'");
          var header = document.createElement("h1");
          header.className = "pageHeading";
          header.innerHTML = "Favorite Images:";
          body.appendChild(header);
          body.appendChild(browsePhotos);
          body.appendChild(statsButton);
          //Append table to the body
          body.appendChild(table);
        }
      </script>
    </body>
</html>
