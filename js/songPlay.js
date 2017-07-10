// Javascript for generating karaoke text

// Initial state
$(document).ready(function() {
  $("#stopbtn").hide();
  $("#draw-pad").width($(window).width()-30);

  // Get song id and bpm from song_play.php hidden inputs
  playid  = $('#getid').val();
  bpm = $('#getbpm').val();

  // Get lyrics from json file
  $.post("ajax/lyricsGet.php",
    {
    playid: playid
    },
    function(data, status){
      if (data.length > 0) {
        lyrics=data;
      }
    },
    "json"
  );

  // Get chords from json file
  $.post("ajax/chordsGet.php",
    {
    playid: playid
    },
    function(data, status){
      if (data.length > 0) {
        chords=data;
      }
    },
    "json"
  );
});

// Responsive canvas size
$(document).ready(function() {
  $(window).resize(function(){
    $("#draw-pad").width($(window).width()-30);
  })
});

// shim layer with setTimeout fallback
window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();

// Canvas coordinates in generating text
var canvas = document.getElementById('draw-pad');
var context = canvas.getContext('2d');
var x = canvas.width / 2;
var y = 90;
var w = 0;
var clearH = 120;
var clearY = 0;
var clearX = 0;

// Set fontface for text
context.font = 'bold 25px sans-serif';
// textAlign aligns text horizontally relative to placement
context.textAlign = 'center';
// textBaseline aligns text vertically relative to font style
context.textBaseline = 'middle';
context.lineWidth = 4;
context.strokeStyle = 'black';

// Function to generate text for animation
function runText() {
 
  // If blank lyric, force width
  textwidth = context.measureText(txt).width
  if(textwidth==0){
  	textwidth=100;
  }

  // Consider margin of 10px in clearing initial text format
  clearX = (canvas.width-textwidth)/2 - 10;

  // Reset text width when end of line is reached
  if (w>=(1+2/bpm)*textwidth){
    context.clearRect(0, clearY, canvas.width, clearH);
    l++;
    if(l<lyrics.length){
    	txt=lyrics[l];
    } 
    else {
    	txt='';
    }
    w = 0;
  }

  // Initial text format
  if (w === 0 || resume == 'yes') {
    context.fillStyle = 'lightblue';
    context.strokeText(txt, x, y);
    context.fillText(txt, x, y);
    context.fillStyle = 'red';
  }
  
  // Apply red color to text 
  context.save();
  context.beginPath();
  context.clearRect(clearX, clearY, w, clearH);
  context.rect(clearX, clearY, w, clearH);
  context.clip();
  context.strokeStyle = 'white';
  context.strokeText(txt, x, y);
  context.fillText(txt, x, y);
  context.restore();

  // Change in width per frame
  w += ((textwidth * bpm) / (240 * fps));

  // Run animation until end of lyrics
  if (l < lyrics.length) {
    // Format chords
    context.fillStyle = 'white';
    context.strokeText(chords[l], x, 30);
    context.fillText(chords[l], x, 30);

    // Save frame ID for pausing and resuming animation
  	globalID = requestAnimFrame(runText);

	} else {
		var toggle = document.getElementById('togglebtn');
		toggle.innerHTML = 'Restart';
    $("#stopbtn").hide();
	}
}

// Function to pause animation
function stopText(){
	cancelAnimationFrame(globalID);
  globalID=0;
}

// Function to control play/pause/resume/restart
function toggleLyrics() {

	var toggle = document.getElementById('togglebtn');
	switch(toggle.innerHTML) {
      case 'Play':
        l=0;
        resume='yes';
        txt=lyrics[l];
        runText();
        toggle.innerHTML = 'Pause'; 
        $("#stopbtn").show();
        break;
	    case 'Resume':
	    	resume='yes';
	    	txt=lyrics[l];
	      runText();
			  toggle.innerHTML = 'Pause'; 
        $("#stopbtn").show();
	      break;
	    case 'Pause':
	        stopText();
			    toggle.innerHTML = 'Resume';
	        break;
	    case 'Restart':
	    	l=0;
	    	w=0;
	    	txt=lyrics[l];
	    	runText();
	    	toggle.innerHTML = 'Pause'; 
        $("#stopbtn").show();
        break;
	    default:
	     break;
	}
}

// Stop animation and reset lyrics
function stopSong(){
  var toggle = document.getElementById('togglebtn');
  toggle.innerHTML = 'Restart';
  l=0;
  w=0;
  cancelAnimationFrame(globalID);
  context.clearRect(clearX, clearY, canvas.width, clearH);
  $("#stopbtn").hide();
}

// Step function with callback
function step(timestamp) {
    var time2 = new Date;
    fps   = 1000 / (time2 - time);
    time = time2;
    window.requestAnimationFrame(step);
}

// Compute frames per second
var time = new Date;
window.requestAnimationFrame(step);