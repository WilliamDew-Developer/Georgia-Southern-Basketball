<!DOCTYPE html>

<html lang = "en">
	
	<head>
		<meta charset = "UTF-8">
		<title>Georgia Southern Basketball</title>
		<link rel = "stylesheet" type = "text/css" href = "./style.css">
	</head>
	
	<body>
		<h1 class = "header">Georgia Southern Basketball</h1>
		
		<!--Navigation Bar-->
		<div class = "navbar">	
			<ul>
				<li><a href = "./index.html">Home</a></li>
				<li><a href = "./roster.html">Roster</a></li>
				<li><a href = "./coaches.html">Coaches</a></li>
				<li><a href = "./schedule.html">Schedule</a></li>
				<li><a href = "./stats.html" class = "active">Stats</a></li>
				<li><a href = "./injuries.html">Injuries</a></li>
				<li><a href = "./rankings.html">Power Rankings</a></li>
				<li><a href = "./highlights.html">Highlights</a></li>
				<li><a href = "./events.html">Events</a></li>
				<li><a href = "./contact.html">Contact Us</a></li>
			</ul>
		</div>
		
		<!--Prompt user to pick a year-->
		<div class = "seasonPick">
			<h2>Men's Basketball Cumulative Statistics</h2>
			<form action = "#" method = "post" id = "statForm">
				<label for = "season">Pick a year:</label>
				<select id ="season" name = "season">
					<option value = "2019-20 stats">2019-20</option>
					<option value = "2018-19 stats">2018-19</option>
					<option value = "2017-18 stats">2017-18</option>
					<option value = "2016-17 stats">2016-17</option>
					<option value = "2015-16 stats">2015-16</option>
					<option value = "2014-15 stats">2014-15</option>
					<option value = "2013-14 stats">2013-14</option>
					<option value = "2012-13 stats">2012-13</option>
					<option value = "2011-12 stats">2011-12</option>
					<option value = "2010-11 stats">2010-11</option>
				</select>
				<input type = "submit" name = "submit" value = "Submit">
			</form>
		</div>
		
		<!--Content Section for statistics tables-->
		<div id = "content" class = "center">
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "project";
				
				if(isset($_POST['submit'])){
					$table = strval($_POST['season']);//get user's submission: ex. 2014-15 stats
					$season = str_replace("stats","Season",$table);//saves table variable in different format: ex. 2014-15 Season
					echo "<h3>". $season . "</h3>";//display table name
					// Create connection
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					// Check connection
					if (!$conn) {
					    die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "SELECT jersey, player, yr, pos, ht, gp, `fg%`, `3fg%`, `ft%`, avgpts, avgreb, ast, stl, blk, fouls FROM `{$table}`" ;
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
						echo 
						"<table>
						<tr>
							<th>Jersey</th>
							<th>Player</th>
							<th>YR</th>
							<th>POS</th>
							<th>HT</th>
							<th>GP</th>
							<th>FG%</th>
							<th>3P%</th>
							<th>FT%</th>
							<th>Avg PTS</th>
							<th>Avg REB</th>
							<th>AST</th>
							<th>STL</th>
							<th>BLK</th>
							<th>Fouls</th>
						</tr>";
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result)) {
					        echo "<tr>";
						    echo "<td>" . $row['jersey'] . "</td>";
						    echo "<td>" . $row['player'] . "</td>";
						    echo "<td>" . $row['yr'] . "</td>";
						    echo "<td>" . $row['pos'] . "</td>";
						    echo "<td>" . $row['ht'] . "</td>";
						    echo "<td>" . $row['gp'] . "</td>";
						    echo "<td>" . $row['fg%'] . "</td>";
						    echo "<td>" . $row['3fg%'] . "</td>";
						    echo "<td>" . $row['ft%'] . "</td>";
						    echo "<td>" . $row['avgpts'] . "</td>";
						    echo "<td>" . $row['avgreb'] . "</td>";
						    echo "<td>" . $row['ast'] . "</td>";
						    echo "<td>" . $row['stl'] . "</td>";
						    echo "<td>" . $row['blk'] . "</td>";
						    echo "<td>" . $row['fouls'] . "</td>";
						    echo "</tr>";
					    }
						echo "</table>";
					} else {
					    echo "0 results";
					}

					mysqli_close($conn);
				}

				
			?>

		</div> 
	
	</body>
	
</html>