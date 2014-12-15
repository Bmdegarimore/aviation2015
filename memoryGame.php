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
      <title>Memory Game</title>
      <link  rel="stylesheet" type="text/css" href="css/memoryStyle.css">
  </head>

  <body>
    <div id="main">
    </div>
    <div class = "menu">
      <div id="left" class="side">
        <a href="main.php" class="buttons"><img src="images/menu.png" alt="menu"></a>
      </div>
      <div id="right">
        <h1><a href="memoryGameTutorial.html">Help</a></h1>
        <a id="resetId" class="buttons" onClick="newBoard()"><img src="images/reset.png" alt="reset game"></a>
      </div>
    </div>
    
    <div id ="memory_board"></div>

    <?php 
      //Get the card section script initializer 
      require "sectionGrabber.php";
      require "memScript.php";
    ?>
  </body>
</html>