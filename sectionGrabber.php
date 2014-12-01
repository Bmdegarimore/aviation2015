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
  $STM = $dbh->prepare("SELECT term, img, audio, sentence FROM Cards WHERE secid = 1");
  //Test statement to grab the _POST section
  if(isset($_POST['sectionid'])){
    //sectionid is passed from the index to the post array
    $STM = $dbh->prepare("SELECT term, img, audio, sentence FROM Cards WHERE secid = $_POST['sectionid']");
  }
  $STM->execute();
  $STMrecords = $STM->fetchAll();

  //create the card script
  print "<script type='text/javascript'>\n";
    //Initialize a counting variable to incremement card id's
    $idIncrementer = 1;

    //Loop through the STMrecords to grab each row of data
    foreach($STMrecords as $row){
      //initialize a struct
      print "var card$idIncrementer = { \nid: \"card$idIncrementer\", \nword: \"$row[0]\", \nimg: \"$row[1]\", \naudio: \"$row[2]\", \ndescription: \"$row[3]\"\n}; \n";
      $idIncrementer++;
    }

    //Create the array 
    print "var card = [";
    for ($counter = 1; $counter < $idIncrementer; $counter++){
      //add a card to the array
      if ($counter == 1){
        print "card$counter";
      }
      else {
        print ", card$counter";
      }
      
    }

    print "]; \n";

    //Get card array size
    print "var cardSize = card.length - 1; \n";

    //make getter functions
    print "function getCards(){\nreturn card;\n} \nfunction getCard(index){\nreturn card[index-1];\n}\n";

  print "</script>";
?>