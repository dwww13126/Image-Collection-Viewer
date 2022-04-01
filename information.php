<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Information</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body onload="readDataBaseInfomation(<?php
    require_once('dbConnect.php');
    if($conn == FALSE) {
    die("Error connecting to mysql server :". mysqli_connect_error());
    }
    $query = "SELECT * FROM `cat-images` WHERE `filename` = '".$_GET['image']."'";
      $result = mysqli_query($conn, $query);
      if($result){
      $row = mysqli_fetch_assoc($result);
      echo $row['favorite'].", ".$row['category'].", '".$row['comment']."', ".$row['rating']."";
    } ?>);">
    <div class="container">
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
              <legend class="categoryLabel">Category:</legend>
              <select name="category" id="categoryField">
                <option value="0">Sad</option>
                <option value="1">Happy</option>
                <option value="2">Grumpy</option>
                <option value="3">Cute</option>
                <option value="4">Strong</option>
                <option value="5">Abnormal</option>
                <option value="6">Playing</option>
                <option value="7">Food</option>
              </select>
              <p id="categoryMessage"></p>
            </fieldset>
            <fieldset>
              <legend class="infoFieldLabel">Favorite:</legend>
              <label class="radioButtons">
                <input type="radio" name="favorite" value="0">No
              </label>
              <label class="radioButtons">
                <input type="radio" name="favorite" value="1">Yes
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
            <button type="button" class="validButtonInfo" id="validButtonInfo" onclick="validateUserInput();">Save:</button>
            <button type="button" class="favoritedImagesInfo" onclick="location.href = 'index.php';" >Browse Images:</button>
        </div>
      </form>
      </div>
      <script src="script.js"></script>
    </body>
</html>
