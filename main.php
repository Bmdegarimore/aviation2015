<?php
    //*** Start a session
    session_start();
    //*** Start the buffer
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
    <title>Main Page</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/mainStyle.css">
 
  </head>

  <body>
    <div class="dropdown">
      <ul class="nav nav-pills">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Account<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
      </ul>
    </div>
    <h1>Aviation</h1>
    <img src="images/green-river-logo-white.png">
        <br>
        <p>Welcome to the Aviation website for Green River Community College. Please click on a section to get started!</p>
    <div id="listContainer">
      <ul id="expList">
        <?php
          //Connect to the Database
          require "db.php";

          try {
            $dbh = new PDO("mysql:host=$hostname;
                           dbname=caseym_Aviation", $username, $password);
            //echo "Connected to database.";
          } 
          catch (PDOException $e) {
            echo $e->getMessage();
          }

          $STM = $dbh->prepare("SELECT count(*) FROM Section");
          //Test statement to grab the _POST section
          $STM->execute();
          $STMrecords = $STM->fetch();
          $sectionIncrementer=1;
          while($sectionIncrementer <= $STMrecords[0]){
            if($sectionIncrementer%2 == 1){
              print "<div class='boxDesign'>";
              print "<div class=\"left\">
                <li>Section $sectionIncrementer <br><span class='smaller'>Click Here!</span>
                  <ul>
                    <li class =\"inline\"><a id=\"one\" href=\"flashcard.php?secid=".urlencode($sectionIncrementer)."\"><img src=\"images/flashcard.png\"><h2>Flash Cards</h2></a></li> 
                    <li class =\"inline\"><a href=\"memoryGame.php?secid=".urlencode($sectionIncrementer)."\"><img src=\"images/memoryGame.png\"><h2>Memory Game</h2></a></li>
                    <li class = \"inline\"><a href=\"quiz.php?secid=".urlencode($sectionIncrementer)."\"><img src=\"images/quiz.png\"><h2>Quiz</h2></a></li>
                  </ul>
                </li>  
              </div>";
            }
            else {
              print "<div class=\"right\">
              <li>Section $sectionIncrementer <br><span class='smaller'>Click Here!</span>
                <ul>
                  <li class =\"inline\"><a id=\"two\" href=\"flashcard.php?secid=".urlencode($sectionIncrementer)."\"><img src=\"images/flashcard.png\"><h2>Flash Cards</h2></a></li> 
                  <li class =\"inline\"><a href=\"memoryGame.php?secid=".urlencode($sectionIncrementer)."\"><img src=\"images/memoryGame.png\"><h2>Memory Game</h2></a></li>
                  <li class = \"inline\"><a href=\"quiz.php?secid=".urlencode($sectionIncrementer)."\"><img src=\"images/quiz.png\"><h2>Quiz</h2></a></li>
                </ul>
              </li> 
              </div></div>";
            }
            $sectionIncrementer++;
          }
        //listContainer and expList closing
        print "</ul></div>";

      //Scripts
      print "<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>";
      print "<script src=\"script/mainScript.js\"></script>";
      print "<script src='bootstrap/dist/js/bootstrap.min.js'></script>";
    ?>
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