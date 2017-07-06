// Javascript for generating karaoke text

$(document).ready(function() {
    $("#togglebtn").hide();
    $("#savebtn").hide();
});

chords=[];
lyrics=[];

function previewLyrics() {
    var lines = [];
    chords=[];
	lyrics=[];
	bpm=$('#bpm').val();
    
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
    console.log($('#bpm').val());

    if(chords>''&&lyrics>''&& bpm>0){
    	$("#togglebtn").show();
    	$("#togglebtn").focus();
    	$("#savebtn").show();
    } else {
    	$("#togglebtn").hide();
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


lyrics= ['Wise  men  say,  only  '
		,'fools rush  in,  but'
		,'I  can\'t  help  falling in'
		,'love  with  you']
chords= ['D       F#m          Bm'
		,'G     D      A      G'
		,'A        Bm      G'
		,'D      A      D']



// D    F#m    Bm
// 你 不 乖 有 时
// G  D  A  G
// 还 会 作 怪
// A     Bm     G
// 但 你 不 坏 只 是
// D   A   D
// 不 装 可 爱

// alter table [table]
// add fulltext index `fulltext`
// (`col1` asc,
// 	`col2` desc);

// shim layer with setTimeout fallback
window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();

// beats per minute
// var bpm=78;
// var bpm = 42;
// var bpm=122;


var canvas = document.getElementById('draw-pad');
var context = canvas.getContext('2d');
var x = 10; //canvas.width / 2;
// var y = canvas.height / 2;
var y = 90;
// var txt = 'On the first day of Christmas';
// var l=0;
// var txt = lyrics[l];
var w = 0;
var clearH = 120;
var clearY = 0;
var clearX = 0;

context.font = 'bold 50px sans-serif';
// textAlign aligns text horizontally relative to placement
context.textAlign = 'left';
// context.textAlign = 'center';
// textBaseline aligns text vertically relative to font style
context.textBaseline = 'middle';
context.lineWidth = 4;
context.strokeStyle = 'black';

function runText() {
  // console.log('Run text', w, l);
  // if (w > 700) {

  // if blank lyric, force width
  textwidth = context.measureText(txt).width
  if(textwidth==0){
  	textwidth=100;
  }
  console.log(l,textwidth)

  if (w>=(1+2/bpm)*textwidth){
    // context.clearRect(clearX, clearY, w, clearH);
    context.clearRect(clearX, clearY, 2*w, clearH);
    console.log(lyrics[l],context.measureText(txt).width);
    l++;
    if(l<lyrics.length){
    	txt=lyrics[l];
    } 
    else {
    	txt='';
    }
    w = 0;
  }

  if (w === 0 || resume == 'yes') {
    context.fillStyle = 'lightblue';
    context.strokeText(txt, x, y);
    context.fillText(txt, x, y);
    context.fillStyle = 'red';
  }
  
  context.save();
  context.beginPath();
  context.clearRect(clearX, clearY, w, clearH);
  context.rect(clearX, clearY, w, clearH);
  context.clip();
  context.strokeStyle = 'white';
  context.strokeText(txt, x, y);
  context.fillText(txt, x, y);
  context.restore();


  
  
  // w += (context.measureText(txt).width/bpm);
  w += ((textwidth * bpm) / (240 * fps));
  // console.log(w);

  if (l < lyrics.length) {


  	// Format chords
  // context.fillStyle = 'darkblue';
  context.fillStyle = 'white';
    context.strokeText(chords[l], x, 30);
    context.fillText(chords[l], x, 30);
    context.fillStyle = 'red';

	// requestAnimFrame(runText);
	globalID = requestAnimFrame(runText);
	} else {
		var toggle = document.getElementById('togglebtn');
		toggle.innerHTML = 'Restart';
	}
}

function stopText(){
	cancelAnimationFrame(globalID);
}

function toggleLyrics() {
	// Call function to run text animation
	// l=1;
	// w=0;
	var toggle = document.getElementById('togglebtn');
	// bpm=$('#bpm').val();
	// bpm=90;
	switch(toggle.innerHTML) {
	    case 'Play':
	    	l=0;
	    	resume='yes';
	    	txt=lyrics[l];
	        runText();
			toggle.innerHTML = 'Pause'; 
	        break;
	    case 'Pause':
	        stopText();
			toggle.innerHTML = 'Play';
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
window.requestAnimationFrame(step)