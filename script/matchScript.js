(function(){
<<<<<<< HEAD
	var question = 1; // Amount of questions to ask
    var correct = 0; // Number of correct
    var correctNum = null;
=======
	var pos = 1; // Amount of questions to ask
    var correct = 0; // Number of correct
    var correctNum = null; //Stores the correct answer for the question
>>>>>>> origin/master

	// Remove the 'empty' and 'filled' part of the id's and compare the rest of the strings. 
    function checkShapeDrop(e, correctInt) { 
        var element = e.dataTransfer.getData('text');
<<<<<<< HEAD

        // Prevents default code for drop to execute
        e.preventDefault();
      
          
=======
        var isCorrect = false;
        e.preventDefault();
        

>>>>>>> origin/master
        // if we have a match, replace replace the background color of
        if (element == ("answer"+ correctInt)) {
        	document.getElementById("leftBox").className = "correct";
        
            setTimeout(function() {
                document.getElementById("leftBox").className = "left";
            },(1000));
<<<<<<< HEAD
        
            correct = correct + 1;
        	
        } 
=======
            correct++;	
        } 

>>>>>>> origin/master
        else { 
            //not a match turns red
            document.getElementById("leftBox").className = "incorrect";

            setTimeout(function() {
            	document.getElementById("leftBox").className = "left";
            },(1000));

        } 

        question = question + 1;
        initialize();
    }

 	  // When dragging starts, set dataTransfer's data to the element's id.
    function startShapeDrag(e) {
        e.dataTransfer.setData('text', this.id);
    }

	    // Assign event listeners to the divs to handle dragging.
    function initialize() 
    {    
        
        var anscard1 = null;
        var anscard2 = null;
        var anscard3 = null;
        var anscard4 = null;
        var anscard5 = null;
        
<<<<<<< HEAD
        if(question > 3){
            alert("You got " + correct + " of 3 correct");
            window.location = "quizResult.html";

=======
        //pos should be tested for 1 more than the number of questions. Example: pos>5 >> 4 questions
        if(pos > 4){
            alert("You got " + correct + " of 3 correct");
            window.location = "matchResult.html"
            pos = 0;
            correct = 0;
            //return false;
>>>>>>> origin/master
        }
        
        // Randomize cards
        anscard1 = getCard(Math.floor((Math.random() * 10) + 1));
            
        anscard2 = getCard(Math.floor((Math.random() * 10) + 1));
        while(anscard1 == anscard2){
            anscard2 = getCard(Math.floor((Math.random() * 10) + 1));
        }
        
        anscard3 = getCard(Math.floor((Math.random() * 10) + 1));
        while(anscard3 == anscard2 || anscard3 == anscard1){
            anscard3 = getCard(Math.floor((Math.random() * 10) + 1));
        }
        
        anscard4 = getCard(Math.floor((Math.random() * 10) + 1));
        while(anscard4 == anscard2 || anscard4 == anscard1 || anscard4 == anscard3){
            anscard4 = getCard(Math.floor((Math.random() * 10) + 1));
        }

        anscard5 = getCard(Math.floor((Math.random() * 10) + 1));
        while(anscard5 == anscard2 || anscard5 == anscard1 || anscard5 == anscard3 || anscard5 == anscard4){
            anscard5 = getCard(Math.floor((Math.random() * 10) + 1));
        }

        var arrayAns = [anscard1, anscard2, anscard3, anscard4, anscard5];
        
        
        // Pick answer
        correctNum = Math.floor((Math.random() * 5) + 1);
        //Possible outcomes: 1, 2, 3, 4, 5

        //Initialize first question
        $("#answer1").text(arrayAns[0].word); //Possible Answers On the right
        $("#answer2").text(arrayAns[1].word);
        $("#answer3").text(arrayAns[2].word);
        $("#answer4").text(arrayAns[3].word);
        $("#answer5").text(arrayAns[4].word);

<<<<<<< HEAD
        $("#image").attr("src", arrayAns[(correctNum -1)].image);
        countdown( "timer", 30);  
    }

    document.getElementById("answer1").addEventListener("dragstart", startShapeDrag, false);
    document.getElementById("answer2").addEventListener("dragstart", startShapeDrag, false);
    document.getElementById("answer3").addEventListener("dragstart", startShapeDrag, false);
    document.getElementById("answer4").addEventListener("dragstart", startShapeDrag, false);
    document.getElementById("answer5").addEventListener("dragstart", startShapeDrag, false);
    document.getElementById("box_input").addEventListener("drop", function(){checkShapeDrop(event, correctNum)}, false);

   document.addEventListener("DOMContentLoaded", initialize, false);
=======
        $("#image").attr("src", arrayAns[(correctNum -1)].image); //Puts the correct answer image on the left
        
        countdown( "timer", 30 ); //Calls the countdown function

        document.getElementById("answer1").addEventListener("dragstart", startShapeDrag, false); //Add Event listeners
        document.getElementById("answer2").addEventListener("dragstart", startShapeDrag, false);
        document.getElementById("answer3").addEventListener("dragstart", startShapeDrag, false);
        document.getElementById("answer4").addEventListener("dragstart", startShapeDrag, false);
        document.getElementById("answer5").addEventListener("dragstart", startShapeDrag, false);
        document.getElementById("box_input").addEventListener("drop", function(){checkShapeDrop(event, correctNum)}, false);
         
    }

    document.addEventListener("DOMContentLoaded", initialize, false);
>>>>>>> origin/master
 
    function countdown( elementName, seconds )
    {
    	var element, endTime, msLeft, time;

    	// Checks to see if the countdown reaches less than 1 sec and displays a message
    	// else if keeps counting down
    	function updateTimer()
    	{
        	msLeft = endTime - (+new Date);
        	if ( msLeft < 1000 ) {
            	element.innerHTML = "Time's\n up!";
        	} else {
            	time = new Date( msLeft );
            	element.innerHTML = (time.getUTCSeconds() );
            	setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        	}
    	}

    	element = document.getElementById( elementName );
    	endTime = (+new Date) + 1000 * (seconds);
        updateTimer();
	}



}) ();