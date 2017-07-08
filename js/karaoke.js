// Javascript for generating karaoke text

// Initial state
$(document).ready(function() {
  $("#togglebtn").hide();
  $("#savebtn").hide();
  $("#stopbtn").hide();
  $("#draw-pad").width($(window).width()-30);
});

// Responsive canvas size
$(document).ready(function() {
  $(window).resize(function(){
    $("#draw-pad").width($(window).width()-30);
  })
});


// SAMPLE INPUT
// D       F#m          Bm
// Wise  men  say,  only  
// G     D      A      G
// fools rush  in,  but
// A        Bm      G
// I  can't  help  falling in
// D      A      D
// love  with  you

// Preview requires chords, lyrics and BPM
function previewLyrics() {
  var lines = [];
  chords=[];
	lyrics=[];
	bpm=$('#songbpm').val();
    
  var ctr=0;
  $.each($('#textarea').val().split(/\n/), function (i, line) {
    if(ctr%2==0){
        chords.push(line);
    } else {
    	lyrics.push(line);
    }
    ctr++;
  });

  if(chords>''&&lyrics>''&& bpm>0){
  	$("#togglebtn").show();
  	$("#togglebtn").focus();
  	$("#savebtn").show();
  } else {
  	$("#togglebtn").hide();
    $("#savebtn").hide();
     $("#stopbtn").hide();
  }

  if(lyrics=='' || chords==''){
    $('#textarea').focus()
  	swal ("Lyrics and chords are required")
  	return
  }

  if(bpm==''){
    $('#songbpm').focus()
  	swal ("Beats Per Minute is required")
  	return
  }
}

// Get song details and save to database
function saveSong() {
  previewLyrics()

  var title =$('#songtitle') .val();
  var artist=$('#songartist').val();
  var year  =$('#songyear')  .val();

  if(title==''){
    $('#songtitle').focus()
    swal ("Song Title is required")
    return
  }

  if(artist==''){
    $('#songartist').focus()
    swal ("Song Artist is required")
    return
  }

  if(year==''){
    $('#songyear').focus()
    swal ("Song Year is required")
    return
  } else {
    var dt = new Date();
    var yearNow = 1900 + dt.getYear();

    if(year > yearNow){
      $('#songyear').focus()
      swal ("Please enter a valid year")
      return
    } else{

      swal({
        title: "New Song",
        text: "Submit to save to database",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
      },
      function(){
        $.post(){
          
        }

        setTimeout(function(){
          swal({
            title:"Success",
            text:"New song added!",
            type: "success"
          },function(isConfirm){
            if(isConfirm){
              location.reload();
            }
          });
        }, 2000);
      });
    }
  }
}


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
context.font = 'bold 30px sans-serif';
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