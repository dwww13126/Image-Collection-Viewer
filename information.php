<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Information</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
      <script>
      	//Is used to be able to setup all the values
        function readDataBaseInfomation() {
          var catergorys = ["Sad", "Happy", "Grumpy", "Cute", "Strong", "Abnormal", "Playing", "Food"];
          var information = [<?php
          require_once('dbConnect.php');
          if($conn == FALSE) {
          die("Error connecting to mysql server :". mysqli_connect_error());
          }
          $query = "SELECT * FROM `cat-images` WHERE `filename` = '".$_GET['image']."'";
            $result = mysqli_query($conn, $query);
            if($result){
          	$row = mysqli_fetch_assoc($result);
          	echo "\"".$row['filename']."\", \"".$row['favorite']."\", \"".$row['category']."\", \"".$row['comment']."\", \"".$row['rating']."\"";
          } ?>];
          //For each of the different values in the array, set them to be the relevent values in the page fields

          //Gets each of the different inputs on the page
          var favorited = imageInfo.favorite;
          if(information[1] == "0"){
            favorited.value="0";
          }
          else{
            favorited.value="1";
          }
          if(information[2] == ""){
            document.getElementById("categoryField").value = catergorys[information[0]];
          }
          else{
            document.getElementById("categoryField").value = information[2];
          }
          if(information[3] != ""){
            document.getElementById("commentField").value = information[3];
          }
          if(information[4] != "0"){
            var rating = imageInfo.rating;
            rating.value=information[4];
          }
        }
        //Checks to make sure that the infomation the user has inputted is the
        //correct length before submitting the data to the server
        function validateUserInput() {
          //Creates a varible for storing the value of the input being checked
          var userInput = '';
          //Creates a varible which is used to be able to validate that the string
          //entered into the field is correct
          var validPattern = '';
          //Takes the value from the NH1 Number field
          //Sets the validation pattern to check that the entered string
          //is
          validPattern = /[A-eZa-z0-9_ ]{1,32}$/;
          //Gets the user input from the categoryField text input
          userInput = document.getElementById("categoryField").value;
          //Checks to see if the userInput does not follow the patern set by the validPattern
          if (validPattern.test(userInput) == false) {
            //Checks to see if the user has not entered anything
            if(userInput == "") {
              //Give the user an alert to let them know that they need to fill
              //out the section before it will be able to be submittedfavorite
              alert("Please complete the Category Name field before trying to update the image infomation.");
              document.getElementById("categoryMessage").innerHTML = 'Incomplete';
              return;
            }
            //Give the user an message to let them know that they need to reenter
            // the section before it will be able to be submitted
            document.getElementById("categoryMessage").innerHTML = 'Please enter a valid Category Name (Between 1 and 32 charcters)';
            return;
          }
          //Removes the previous validation message
          document.getElementById("categoryMessage").innerHTML = '';
          userInput = document.getElementById("categoryField").value;
          validPattern = /[a-zA-Z0-9_]{0,256}$/;
          if (validPattern.test(userInput) == false) {
            document.getElementById("commentFieldMessage").innerHTML = 'Please only enter comments using a sequence of lower / upper case letters, numbers or under scores.';
            return;
          }
          document.getElementById("commentFieldMessage").innerHTML = '';
          //Checks to make sure that the value of the favorite image toggle is true that there is
          var favorited = imageInfo.favorite;
          //Submits the form eif all of the fields have been successfully validated
          document.getElementById("imageInfo").submit();
        }
      </script>
    <body onload="readDataBaseInfomation();">
      <h1 class="pageHeading">Image Information:</h1>
      <form action="index.php" method="send" id="imageInfo">
        <div class="imageInfomationDiv">
          <fieldset>
            <img id="First" class="infoImage" src="
            <?php if (isset($_GET['image'])) {
            	echo 'http://localhost/myImages/';
            	echo str_replace(' ', '', $_GET['image']);
              echo '.png';
        		}?>" alt="Selected Image">
            <fieldset>
              <legend class="infoFieldLabel">FileName:</legend>
              <input type="text" readonly="readonly" name="filename" id="filename" value="<?php if (isset($_GET['image'])) {
               echo $_GET['image'];
          		}?>"/>
            </fieldset>
            <fieldset>
              <legend class="infoFieldLabel">Category:</legend>
              <input type="text" name="category" id="categoryField"/>
              <p id="categoryMessage"></p>
            </fieldset>
            <fieldset>
              <legend class="infoFieldLabel">Favorite:</legend>
              <label class="radioButtons">
                <input type="radio" name="favorite" value="1">Yes
              </label>
              <label class="radioButtons">
                <input type="radio" name="favorite" value="0">No
              </label>
              <p id="favoriteMessage"></p>
            </fieldset>
            <fieldset>
              <legend class="infoFieldLabel">Comments:</legend>
              <textArea id="commentField" name="comment" cols="25" rows="5"></textarea>
              <p id="commentFieldMessage"></p>
            </fieldset>
            <fieldset>
              <legend class="infoFieldLabel">Rating:</legend>
              <label class="radioButtons">
                <input type="radio" name="rating" value="0" checked="checked">0
              </label>
              <label class="radioButtons">
                <input type="radio" name="rating" value="1">1
              </label>
              <label class="radioButtons">
                <input type="radio" name="rating" value="2">2
              </label>
              <label class="radioButtons">
                <input type="radio" name="rating" value="3">3
              </label>
              <label class="radioButtons">
                <input type="radio" name="rating" value="4">4
              </label>
              <label class="radioButtons">
                <input type="radio" name="rating" value="5">5
              </label>
              <label class="radioButtons">
                <input type="radio" name="rating" value="6">6
              </label>
              <label class="radioButtons">
                <input type="radio" name="rating" value="7">7
              </label>
              <label class="radioButtons">
                <input type="radio" name="rating" value="8">8
              </label>
              <label class="radioButtons">
                <input type="radio" name="rating" value="9">9
              </label>
              <label class="radioButtons">
                <input type="radio" name="rating" value="10">10
              </label>
            </fieldset>
          </fieldset>
          <button type="button" class="validButtonInfo" id="validButtonInfo" onclick="validateUserInput();">Save Changes:</button>
            <button type="button" class="favoritedImagesInfo" onclick="location.href = 'favorite.php';" >Favorited Images:</button>
        </div>
      </form>
    </body>
</html>
