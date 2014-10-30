/* Sectiontwo.js
 * This script is a container for the cards contained in section
 * two. It also has a function to pull the cards. 
 * Author: Corey Johnson
 * Version: 1.0
 */

var card1 = {
	id: "card1",
	word: "Fuselage",
	audio: "http://translate.google.com/translate_tts?ie=utf-8&tl=en&q=Fuselage",
	image: "section2/term1.jpg",
	description: "The fuselage is the passenger section of a plane."
};

var card2 = {
	id: "card2",
	word: "Flaps",
	audio: "http://translate.google.com/translate_tts?ie=utf-8&tl=en&q=Flaps",
	image: "section2/term2.jpg",
	description: "Flaps are used to adjust pitch."
};

var card3 = {
	id: "card3",
	word: "Wings",
	audio: "http://translate.google.com/translate_tts?ie=utf-8&tl=en&q=Wings",
	image: "section2/term3.jpg",
	description: "Wings allow the plane to glide."
};

var card4 = {
	id: "card4",
	word: "Empennage",
	audio: "http://translate.google.com/translate_tts?ie=utf-8&tl=en&q=Empennage",
	image: "section2/term4.jpg",
	description: "The empennage is the tail end of plane."
};

var card5 = {
	id: "card5",
	word: "Ailerons",
	audio: "http://translate.google.com/translate_tts?ie=utf-8&tl=en&q=Ailerons",
	image: "section2/term5.jpg",
	description: "Ailerons are used to adjust drag and aerodynamics on the wings."
};

var card6 = {
	id: "card6",
	word: "Stabilizers",
	audio: "http://translate.google.com/translate_tts?ie=utf-8&tl=en&q=stabilizers",
	image: "section2/term6.jpg",
	description: "There are many stabilizers on the plane."
};

var card7 = {
	id: "card7",
	word: "Flight Controls",
	audio: "http://translate.google.com/translate_tts?ie=utf-8&tl=en&q=Flight%20Controls",
	image: "section2/term7.jpg",
	description: "The flight controls are on the wings, used for pitch, yaw, etc."
};

var card8 = {
	id: "card8",
	word: "Nosewheel",
	audio: "http://translate.google.com/translate_tts?ie=utf-8&tl=en&q=Nose%20Wheel",
	image: "section2/term8.jpg",
	description: "The nosewheel of a plane is located in the front."
};

var card9 = {
	id: "card9",
	word: "Main Wheels",
	audio: "http://translate.google.com/translate_tts?ie=utf-8&tl=en&q=Main%20Wheels",
	image: "section2/term9.jpg",
	description: "The main wheels are the back wheels on the plane."
};

var card10 = {
	id: "card10",
	word: "Tricycle Gear",
	audio: "http://translate.google.com/translate_tts?ie=utf-8&tl=en&q=Tricycle%20Gear",
	image: "section2/term10.jpg",
	description: "Tricycle gear planes have 1 nose wheel and two main wheels."
};

//Array
var card = [card1, card2, card3, card4, card5, card6, card7, card8,
			card9, card10];
var cardSize = card.length-1;
