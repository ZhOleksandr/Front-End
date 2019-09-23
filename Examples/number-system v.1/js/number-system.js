
$(document).ready(function() {    
$('.one').val('0');
$('.two').val('0');
$('.three').val('0');
$('.four').val('0');
//var count = 1;

  
 var numSys;
    $('#num_systems').change(function() {
        var sel = ($('#num_systems option:selected').text()); 
         if (sel == 'decimal') {
              numSys = 10;
         } else if (sel == 'binary') {
              numSys = 2; 
         } else if (sel == 'hexadecimal') {
              numSys = 16; 
         } else {
            numSys = 'Виберість систему числення';
         }
         $('#numSys').text(numSys);
    });
   
//var box = document.getElementById('calculation');
//var sel = box.options[box.selectedIndex].text;

//ONE
$('.btn-one').on( "click", function() { 
  switchBtn();

  //$('.count').text(count++);
  
  

  if(clickTime == 2){
    switchBtnTwo()
  }

  if(clickTimeTwo == 2){
    switchBtnThree();
    clickTimeTwo = 0;   
    }

  if(clickTimeThree == 2){
    switchBtnFour();
    clickTimeThree = 0;   
    }  
    calcNumSys();
});

function numZero () {   
  $('.one').val('0'); 
}

function numOne () {
	$('.one').val('1');
}
/*
function numTwo () {
  $('.one').val('2');
}
*/
var clickTime = 0;
function switchBtn() {
 
  clickTime++;
  if(clickTime == 3)
        clickTime = 1;

  switch (clickTime) {
    case 1:
      numOne();
      break;
    
    case 2:      
      numZero();
      break;    
    }

}

// TWO

$('.btn-two').on( "click", function() {
  
  switchBtnTwo();

  if(clickTimeTwo == 2){
    switchBtnThree();
    clickTimeTwo = 0;   
    }

  if(clickTimeThree == 2){
    switchBtnFour();
    clickTimeThree = 0;   
    } 
    calcNumSys();
});

function numZeroTwo () {  
  $('.two').val('0'); 
}

function numOneTwo () { 
  $('.two').val('1');
}
/*
function numTwoTwo () {
  $('.two').val('2');
}
*/
var clickTimeTwo = 0;
function switchBtnTwo() {

  clickTimeTwo++;
  if(clickTimeTwo == 3)
        clickTimeTwo = 1;

  switch (clickTimeTwo) {
    case 1:
      numOneTwo();      
      break;
    
    case 2:
      numZeroTwo();
      break;
    
    }
}

// THREE

$('.btn-three').on( "click", function() {
 
  switchBtnThree();

  if(clickTimeThree == 2){
    switchBtnFour();
    clickTimeThree = 0;   
    }
    calcNumSys();
});

function numZeroThree () {  
  $('.three').val('0'); 
}

function numOneThree () { 
  $('.three').val('1');
}
/*
function numTwoThree () {
  $('.three').val('2');
}
*/
var clickTimeThree = 0;
function switchBtnThree() { 

  clickTimeThree++;
  if(clickTimeThree == 3)
        clickTimeThree = 1;

  switch (clickTimeThree) {
    case 1:
      numOneThree();      
      break;
   
    case 2:
      numZeroThree();
      break;
    
    }
}


// FOUR

$('.btn-four').on( "click", function() {
 
  switchBtnFour();
  calcNumSys();
});

function numZeroFour () {  
  $('.four').val('0'); 
}

function numOneFour () { 
  $('.four').val('1');
}
/*
function numTwoFour () {
  $('.four').val('2');
}
*/
var clickTimeFour = 0;
function switchBtnFour() { 

  clickTimeFour++;
  if(clickTimeFour == 3)
        clickTimeFour = 1;

  switch (clickTimeFour) {
    case 1:
      numOneFour();      
      break;

    case 2:
      numZeroFour();
      break;
    
    }
}




//Вивід даних

var omeNum = 0;
var twoNum = 0;
var threeNum = 0;
var fourNum = 0;

//функція приведення до степеню
function pow(x, n) {
  for (let i = 1; i < n; i++) {
    result *= x;
  }
}


 function calcNumSys() {
    firstNum = document.getElementById('_one').value;
    twoNum = document.getElementById('_two').value;
    threeNum = document.getElementById('_three').value;
    fourNum = document.getElementById('_four').value;

    

    let dec = (fourNum * Math.pow(2,3)) 
            + (threeNum * Math.pow(2,2))
            + (twoNum * Math.pow(2,1))
            + (firstNum * Math.pow(2,0));


    $('.sum').text(dec);
  };




});


