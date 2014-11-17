<!doctype html>
<html>
	<head>
			<title>Match Quiz Results</title>
			<link  rel="stylesheet" href="css/matchResultStyle.css">
	</head>
	<body>
		<div id="resultWrapper">
			<h1>End of Quiz1</h1>
			<?php
			$total = 3;
			$score = $_GET["var1"];
			if ($score ==  $total)
			{
				echo "<h2>Congratulations!</h2>";
			}
			else
			{
				echo "<h2>Please take sometime to practice this section again.</h2>";
			}

			echo "<h2>Your score was " . $score . " out of " . $total . ".</h2>";
			?>
			<br>
			<input type="submit" href="main.html" id="submit" value="Save and Return to Main Menu">
		</div>
	</body>
</html>