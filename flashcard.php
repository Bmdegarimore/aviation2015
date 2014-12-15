<?php
//Start a session
session_start();
// Start the buffer
ob_start();

    /*if(empty($_SESSION["myusername"])){
    session_unset();
    header("location:index.html");
    }*/
    if(empty($_SESSION["loggedin"])){
      session_unset();
      header("location:index.html");
    }

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Aviation</title>
		<link rel="stylesheet" type="text/css" href="css/flashcard.css">
	</head>

	<body>
		<div class = "menu">
			<a href="main.php"><img src="images/menu.png" alt="menu"></a>
		</div>

		<div id="content">
			<div class="card" id="card1">
				<div class="word"></div>
					
				<br>

				<section>					
					<img class="imageBorder" alt="image of word">					
				</section>
				
				<div class="desc">
					
				</div>
			</div>
			
			<div>
				<img id="prev" src="images/left.png" alt="back button">
				<img id="audioIcon" src="images/audioicon.png" alt="audio icon to hear word">
				<audio id="audioPlay"></audio>
				<img id="next" src="images/right.png" alt="forward button">
			</div>
		</div>

		<script src="http://code.jquery.com/jquery.js"></script>
		<?php
			require 'sectionGrabber.php';
		?>
		<script>
			$(document).ready(function() {
				next();
				$("#prev").click(function () {
					prev();
				});

				$("#next").click(function () {
					next();
				});

				$("#audioIcon").click(function() {
					document.getElementById("audioPlay").load();
					document.getElementById("audioPlay").play();	
				});

				function grid(){
					next();
				}
			});
		</script>
		<hr>
    	<footer>
      		<p><a href="admin/index.php">Administration</a></p>
    	</footer>
	</body>
</html>
<?php
//Flush buffer
 ob_flush();
?>