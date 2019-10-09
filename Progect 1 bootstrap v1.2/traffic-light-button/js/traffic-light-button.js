
$(document).ready(function() {

/*
function illuminateRed () {  
  $('.red').css('background-color', 'red'); 
}

function illuminateYellow () {  
  $('.yellow').css('background-color', 'yellow');
}

$('.switch').one( "click", function() {
  illuminateRed();

  illuminateYellow();
});
*/

$('.btn-traffic').on( "click", function() {
  btnTtraffic();
});

function illuminateRed () {
  darkLights(); 
  $('.my-red').css('background-color', 'red'); 
}

function illuminateYellow () {
	darkLights();
	$('.my-yellow').css('background-color', 'yellow');
}

function illuminateGreen () {
	darkLights();
	$('.my-green').css('background-color', 'lime');
}

function illuminateRedYellow () {
	darkLights();
	$('.my-red').css('background-color', 'red');
	$('.my-yellow').css('background-color', 'yellow');
}

function illuminateGreenFlash() {
  setTimeout(function(){
          $('.my-green').css('background-color', 'lime')
               .animate({opacity:"hide"}, 500)
               .animate({opacity:"show"}, 500)               
               ;               
  }, 0);
};

function darkLights () {
	$('.my-red').css('background-color', '#2f0000');
	$('.my-yellow').css('background-color', '#211802');
	$('.my-green').css('background-color', '#000400');
}


var clickTime = 0;
function btnTtraffic() {
 
  clickTime++;
  if(clickTime == 8)
        clickTime = 1;

  switch (clickTime) {
    case 1:
      illuminateRed();
      break;
    case 2:
      illuminateRedYellow();
      break;
    case 3:
      illuminateGreen();
      break;
    case 4:
      illuminateGreenFlash();
      break;
    case 5:
      illuminateYellow();
      break;
    case 6:
      illuminateRed();
      break;
    case 7:
      darkLights ();
      break;
  }
}

});
