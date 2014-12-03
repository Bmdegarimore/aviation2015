<?php
//Start a session
session_start();
// Start the buffer
ob_start();

    if(empty($_SESSION["myusername"])){
    session_unset();
    header("location:index.html");
    }
?>
<!doctype html>
<html>
	<head>
		<title>Match Quiz</title>
		<link  rel="stylesheet" href="css/quizStyle.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="section">
				<h1>Section Quiz</h1>
				
			</div>

			<div id="matching_area">
				<div class="left">
					<h1 id="questionNum"></h1>

					<div class="image_border">
						<img id="image" onClick="" draggable="false"  alt="image">
						<audio id="audioPlay" autoplay></audio>
					</div>		
									
				</div>
				
				<div class="right">
					<h1>Choose an answer:</h1>
					<div id="choices">
						<h2 class= "select" id="answer1" draggable="false"></h2>
						<h2 class= "select" id="answer2" draggable="false"></h2>
						<h2 class= "select" id="answer3" draggable="false"></h2>
						<h2 class= "select" id="answer4" draggable="false"></h2>
					</div>
					
				</div>
			</div>

			<div id="bottom">
				<input type="submit" id="submit" value="Submit Answer" onClick="checkShapeDrop(event);">
			</div>

			<h1><a href="quizTutorial.html">Help</a></h1>

			<script src="http://code.jquery.com/jquery.js"></script>
			<?php
				include "sectionGrabber.php";
				include "quizScript.php";
			?>
		</div>
	</body>
</html>
<?php
//Flush buffer
 ob_flush();
?>