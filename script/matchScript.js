(function(){
	
	// Remove the 'empty' and 'filled' part of the id's and compare the rest of the strings. 
    function checkShapeDrop(e) { 
        var element = e.dataTransfer.getData('text');
        e.preventDefault();

        // if we have a match, replace replace the background color of
        if (element == "chicken") {
        	document.getElementById(e.dataTransfer.getData('text')).style.display = "none";
        	document.getElementById("leftBox").className = "correct";
        	
        } else { 
            //not a match turns red
            document.getElementById("leftBox").className = "incorrect";

            setTimeout(function() {
            	document.getElementById("leftBox").className = "left";
            },(1000));
        } 
    }

 	  // When dragging starts, set dataTransfer's data to the element's id.
    function startShapeDrag(e) {
        e.dataTransfer.setData('text', this.id);
    }

	    // Assign event listeners to the divs to handle dragging.
    function initialize() {
    document.getElementById("bob").addEventListener("dragstart", startShapeDrag, false);
    document.getElementById("monkey").addEventListener("dragstart", startShapeDrag, false);
    document.getElementById("chicken").addEventListener("dragstart", startShapeDrag, false);
    document.getElementById("chupa").addEventListener("dragstart", startShapeDrag, false);
    document.getElementById("jolly").addEventListener("dragstart", startShapeDrag, false);
    document.getElementById("box_input").addEventListener("drop", checkShapeDrop, false);
	}

   document.addEventListener("DOMContentLoaded", initialize, false);

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

countdown( "timer", 30 );

}) ();