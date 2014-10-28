/** Card Manager
  * Authors: Ryan Hendrickson, Corey Johnson, Brandon Degarimore, Casey Morris
  * This script manages the section cards. 
  * Each card contains a term, audio, image, and 
  * sentence. 
  * 
  * Functions:
  * .next() - Goes to the next card
  * .prev() - Goes to the previous card
  * .grid() - Zooms out of the current card to the list of cards
  * .focus() - Zooms into the selected card
  * .quiz() - Sets up the page for a quiz
  *
  *	Version: 0.2
  */

//Globals
var curCard = 0;

//Card var instatiations
var card1 = {
	id: "card1",
	word: "FAA Certified Flight Instructor (CFI)",
	audio: "https://translate.google.com/translate_tts?ie=utf-8&tl=en&q=F%20A%20A%20Certified%20Flight%20Instructor%20(C.F.I)",
	image: "section1/term1.jpg",
	description: "It takes a lot of time and experience to become an FAA Certificated Flight Instructor!"
};

var card2 = {
	id: "card2",
	word: "Alcohol",
	audio: "https://translate.google.com/translate_tts?ie=utf-8&tl=en&q=Alcohol",
	image: "section1/term2.jpg",
	description: "Alcohol should never be consumed while flying!"
};

var card3 = {
	id: "card3",
	word: "Hot Air Balloon",
	audio: "https://translate.google.com/translate_tts?ie=utf-8&tl=en&q=Hot%20air%20balloon",
	image: "section1/term3.jpg",
	description: "Hot Air Balloon rides are very popular in the United States, but they are very slow moving, so watch out when you are flying!"
};

//Array
var card = [card1, card2, card3];
var cardSize = card.length-1;

//Functions

/* Update the html on:
	word
	audio
	imageBorder
	desc
*/
function next() {
	$(".word").html(card[curCard].word);
	$("#audioPlay").attr("src",card[curCard].audio);
	$(".imageBorder").attr("src",card[curCard].image);
	$(".desc").html(card[curCard].description);
	if (curCard<cardSize){
		curCard++;
	}
	else if (curCard==cardSize){
		curCard=0;
	}
};

function prev() {
	if (curCard>0){
		curCard--;
	}
	else if (curCard==0){
		curCard=cardSize;
	}
	$(".word").html(card[curCard].word);
	$("#audioPlay").attr("src",card[curCard].audio);
	$(".imageBorder").attr("src",card[curCard].image);
	$(".desc").html(card[curCard].description);
};

function grid() {
	next();
};

function focus() {

};

function quiz() {

};

function getAudio() {
	return curCard.audio;
};