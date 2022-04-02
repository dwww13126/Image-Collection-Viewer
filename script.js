  //Is a function which takes in a array of images to create
  //a 3 by 3 grid of images.
  function FavImageGrid(array) {
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
    //Gets the container ellement from the HTML document
    var container = document.getElementsByClassName("container")[0];
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
          var screenw = (screen.width / 2) / 3;
          image.style.height= screenw - 30 + "px";
          image.style.width= screenw - 30 + "px";
          var imageName = currentImageURL.replace('http://localhost/myImages/', '');
          //Sets the alt property of the image to be the current image url
          image.setAttribute("alt", imageName);
          comment.innerHTML = arguments[currentDrawn + 1];
          if (arguments[currentDrawn] != "No Image Favorited") {
            //Sets the src property of the image to be the current image url
            image.setAttribute("src", currentImageURL+".png");
            //Add the image to the current table data
            link.href = "information.php?image=" + imageName;
            link.appendChild(image);
            tableData.appendChild(link);
          }
          else{
            image.setAttribute("src", "http://localhost/ImageViewer/no-image.png");
            tableData.appendChild(image);
          }
          tableData.appendChild(comment);
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
    browsePhotos.innerHTML = "Browse Images:";
    statsButton.innerHTML = "Image Stats:";
    statsButton.className = "statsButton";
    browsePhotos.className = "browsePhotos";
    statsButton.setAttribute("onclick", "location.href='stats.php'");
    browsePhotos.setAttribute("onclick", "location.href='index.php'");
    var header = document.createElement("h1");
    header.className = "pageHeading";
    header.innerHTML = "Favorite Images:";
    container.appendChild(header);
    container.appendChild(browsePhotos);
    container.appendChild(statsButton);
    //Append table to the container
    container.appendChild(table);
  }

  //Is a function which takes in a array of images to create
  //a 3 by 3 grid of images.
  function NewImageGrid(array) {
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
    //Gets the container ellement from the HTML document
    var container = document.getElementsByClassName("container")[0];
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
          var screenw = (screen.width / 2) / 3;
          image.style.height= screenw - 30 + "px";
          image.style.width= screenw - 30 + "px";
          //Sets the src property of the image to be the current image url
          image.setAttribute("src", currentImageURL+".png");
          var imageName = currentImageURL.replace('http://localhost/myImages/', '');
          //Sets the alt property of the image to be the current image url
          image.setAttribute("alt", imageName);
          comment.innerHTML = arguments[currentDrawn + 1];
          //Add the image to the current table data
          link.href = "information.php?image=" + imageName;
          link.appendChild(image);
          tableData.appendChild(link);
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
    var reloadButton = document.createElement("button");
    //Creates the buttons used to be able to go to the favorited images
    var favImageButton = document.createElement("button");
    reloadButton.innerHTML = "Reload Grid:"
    favImageButton.innerHTML = "View Favorited:"
    favImageButton.className = "favoritedImages";
    reloadButton.className = "reloadImages";
    var header = document.createElement("h1");
    header.className = "pageHeading";
    header.innerHTML = "Cat Images:";
    favImageButton.setAttribute("onclick", "location.href='favorite.php'");
    reloadButton.setAttribute("onclick", "location.href='index.php'");
    container.appendChild(header);
    container.appendChild(favImageButton);
    container.appendChild(reloadButton);
    //Append table to the container
    container.appendChild(table);
  }

  //Is used to be able to setup all the values
  function readDataBaseInfomation(favorite, category, comment, rating) {
    var imageInfo = document.getElementById("imageInfo");
    //Sets each of the different inputs on the page
    document.getElementsByName("favorite")[favorite].setAttribute("checked", "");
    imageInfo.favorite = favorite;
    document.getElementById("categoryField").value = category;
    document.getElementById("commentField").value = comment;
    if(rating != 0){
      var rating = imageInfo.rating;
      rating.value = rating;
    }
  }
  //Checks to make sure that the infomation the user has inputted is the
  //correct length before submitting the data to the server
  function validateUserInput() {
    var imageInfo = document.getElementById("imageInfo");
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
    imageInfo.submit();
  }
