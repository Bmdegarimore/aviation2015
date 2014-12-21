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
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <!-- Bootstrap -->
      <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <title>Memory Game</title>
      <link  rel="stylesheet" type="text/css" href="css/memoryStyle.css">
  </head>

  <body>
    <div class="container-fluid">
      <div class = "row col-md-12">
        <div class="col-md-6">
          <a href="main.php" class="buttons"><img class="buttons img-responsive" src="images/menu.png" alt="menu"></a>
        </div>
        
        <div class="col-md-6">
          <a id="resetId" onClick="newBoard()"><img class="pull-right buttons img-responsive" src="images/reset.png" alt="reset game"></a>
        </div>
      </div>
      <div class= "row">
        <div id ="memory_board" class="container col-md-4 col-md-offset-4">
        </div>
      </div>
    </div>
    

    <?php 
      //Get the card section script initializer 
      require "sectionGrabber.php";
      require "memScript.php";
    ?>
    <footer class="container-fluid">
      <hr>
      <a href="admin/index.php">Administration</a>
      <a href="memoryGameTutorial.html">Help</a>
    </footer>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src='bootstrap/dist/js/bootstrap.min.js'></script>
    
  </body>
</html>