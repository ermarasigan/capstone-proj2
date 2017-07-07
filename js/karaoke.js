// Javascript for generating karaoke text

// Initial state
$(document).ready(function() {
  $("#togglebtn").hide();
  $("#savebtn").hide();
  $("#draw-pad").width($(window).width()-30);
});

$(document).ready(function() {
  $(window).resize(function(){
    $("#draw-pad").width($(window).width()-30);
  })
});


chords=[];
lyrics=[];

function previewLyrics() {
    var lines = [];
    chords=[];
	lyrics=[];
	bpm=$('#songbpm').val();
    
    var ctr=0;
    $.each($('#textarea').val().split(/\n/), function (i, line) {
    	console.log(ctr);
        if(ctr%2==0){
            chords.push(line);
        } else {
        	lyrics.push(line);
        }
        ctr++;
    });
    console.log(chords);
    console.log(lyrics);
    console.log($('#songbpm').val());

    if(chords>''&&lyrics>''&& bpm>0){
    	$("#togglebtn").show();
    	$("#togglebtn").focus();
    	$("#savebtn").show();
    } else {
    	$("#togglebtn").hide();
      $("#savebtn").hide();
    }

    if(lyrics=='' || chords==''){
    	swal ("Lyrics and chords are required")
    	return
    }
    if(bpm==''){
    	swal ("BPM is required")
    	return
    }

}


function saveSong() {

}
// D       F#m          Bm
// Wise  men  say,  only  
// G     D      A      G
// fools rush  in,  but
// A        Bm      G
// I  can't  help  falling in
// D      A      D
// love  with  you


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
context.font = 'bold 40px sans-serif';
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
    context.clearRect(clearX, clearY, 2*w, clearH);
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
	}
}

// Function to pause animation
function stopText(){
	cancelAnimationFrame(globalID);
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
        break;
	    case 'Resume':
	    	resume='yes';
	    	txt=lyrics[l];
	      runText();
			  toggle.innerHTML = 'Pause'; 
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
	    default:
	        break;
	}
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