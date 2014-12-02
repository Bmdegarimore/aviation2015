<!DOCTYPE html>
<html>
  <head>
    <title>Main Page</title>
    <link rel="stylesheet" type="text/css" href="css/mainStyle.css">
 
  </head>

  <body>
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

          //pull the card section default to 1? 
          $STM = $dbh->prepare("SELECT count(*) FROM Cards WHERE secid = 1");
          //Test statement to grab the _POST section
          if(isset($_POST['sectionid'])){
            //sectionid is passed from the index to the post array
            $STM = $dbh->prepare("SELECT count(*) FROM Cards WHERE secid = $_POST['sectionid']");
          }
          $STM->execute();
          $STMrecords = $STM->fetchAll();

          <div class="boxDesign">
            <div class="left">
              <li>Section 1 <br><span class='smaller'>Click Here!</span>
                <ul>
                  <li class ="inline"><a id="one" href="sectionone.html"><img src="images/flashcard.png"><h2>Flash Cards</h2></a></li> 
                  <li class ="inline"><a href="memoryGameTutorial.html"><img src="images/memoryGame.png"><h2>Memory Game</h2></a></li>
                  <li class = "inline"><a href="quizTutorial.html"><img src="images/quiz.png"><h2>Quiz</h2></a></li>
                </ul>
              </li>  
            </div> //Left End
            <div class="right">
              <li>Section 2 <br><span class='smaller'>Click Here!</span>
                <ul>
                  <li class ="inline"><a id="two" href="sectiontwo.html"><img src="images/flashcard.png"><h2>Flash Cards</h2></a></li> 
                  <li class ="inline"><a href="memoryGameTutorial.html"><img src="images/memoryGame.png"><h2>Memory Game</h2></a></li>
                  <li class = "inline"><a href="quizTutorial.html"><img src="images/quiz.png"><h2>Quiz</h2></a></li>
                </ul>
              </li> 
            </div> //Right End
          </div> //BoxDesign end
        //listContainer and expList closing
        print "</ul></div>";

      //Scripts
      print "<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>";
      print "<script src=\"script/mainScript.js\"></script>";

    ?>
  </body>
</html>