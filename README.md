# Image-Collection-Viewer

Project from COMPX222 Web Development where we were to create a PHP based website which provides a user with a randomized grid of images which they can save under their favorites and add information about. Initial project was based on Mars images, however the images used by this assessment have been removed from the university webserver so project has been altered to provide a user with cat images included with the project. Additions and fixes will be made to improve on the project.

## Setup Instructions

1. Place all files and folders (Excluding the SetupSQL folder) into your webservers htdocs folder.

2. Inside dbConnect.php, edit mysqli_connect with your database connection information.
`mysqli_connect("localhost","Username","UserPassword","DatabaseName");`

3. From the SetupSQL folder, import cat-images.sql onto your database to create the table used for storing image data.

4. From the SetupSQL folder, import cat-images-data.sql to the cat-images table on your database.
