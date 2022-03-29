<html>
  <head>
	<title>Stats:</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Category');
        data.addColumn('number', 'NumberFavorited');
        data.addRows([
	<?php
	    require_once('dbConnect.php');
	    if($conn == FALSE)
		die("Error connecting to mysql server :". mysqli_connect_error());
		$query = "SELECT * FROM `cat-images`";
	    $result = mysqli_query($conn, $query);
		$count = 0;
	    if($result){
			$cat0Sad = 0;
			$cat1Happy = 0;
			$cat2Grumpy = 0;
			$cat3Cute = 0;
			$cat4Strong = 0;
			$cat5Abnormal = 0;
			$cat6Playing = 0;
			$cat7Food = 0;
			while($row = mysqli_fetch_assoc($result))
			{
				if ($row['favorite'] == 1){
					if ($row['label'] == 0){
						$cat0Sad++; }
					else if ($row['label'] == 1){
						$cat1Happy++; }
					else if ($row['label'] == 2){
						$cat2Grumpy++; }
					else if ($row['label'] == 3){
						$cat3Cute++; }
					else if ($row['label'] == 4){
						$cat4Strong++; }
					else if ($row['label'] == 5){
						$cat5Abnormal++; }
					else if ($row['label'] == 6){
						$cat6Playing++; }
					else if ($row['label'] == 7){
						$cat7Food++; }
				}
			}
      ("Sad", "Happy", "Grumpy", "Cute", "Strong", "Abnormal", "Playing", "Food");
			echo "['Sad', ".$cat0Sad."],
          ['Happy', ".$cat1Happy."],
          ['Grumpy', ".$cat2Grumpy."],
          ['Cute', ".$cat3Cute."],
          ['Strong', ".$cat4Strong."],
          ['Abnormal', ".$cat5Abnormal."],
          ['Playing', ".$cat6Playing."],
          ['Food', ".$cat7Food."]";
		}
	    else die("Error in database query");
	    mysqli_close($conn); ?>]);

        options = {
          title: 'Stats:'
          ,chartArea:{left:0,top:0,width:"100%",height:"100%"}
          ,height: 800
          ,width: 1000
          ,backgroundColor: '#471002'
          ,legendTextStyle: {
            fontName: 'Times-Roman',
            fontSize: 18,
            bold: true,
            color: 'white',
            auraColor: '#000000'
          }
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
	<link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <!--Div that will hold the pie chart-->
      <button type="button" class="favoritedImagesStats" onclick="location.href = 'favorite.php';" >Favorited Images:</button>
      <button type="button" class="browsePhotosStats" onclick="location.href = 'index.php';" >Browse Images:</button>
    <div id="chart_div"></div>
  </body>
</html>
