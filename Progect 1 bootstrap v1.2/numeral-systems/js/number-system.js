$(document).ready(function() {    
$('.one').val('0');
$('.two').val('0');
$('.three').val('0');
$('.four').val('0');
 var countOne = 0; 
 var countTwo = 0; 
 var countThree = 0; 
 var countFour = 0;
 var dec = [0,1,2,3,4,5,6,7,8,9];
 var numSys;
 var hex = [0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f'];

 //функція що обнуляє показники
 function resetToZero(){
    countOne = 0;
    countTwo = 0;
    countThree = 0;
    countFour = 0;
    $('.one').val('0');
    $('.two').val('0');
    $('.three').val('0');
    $('.four').val('0');
    $('#sum').text('0');
 }
 
 $('#my-reset').click(function() {
  resetToZero();
});

var selOut;
var selIn;
// функція, що вибирає систему числення для відображення
    $('#calculation').change(function() {                     
        selOut = ($('#calculation option:selected').text());
        resetToZero();
    });

// функція, що вибирає систему числення з, скидає count на 0 і встановлює в input значення 0
    $('#num_systems').change(function() {                     
        selIn = ($('#num_systems option:selected').text()); 
         if (selIn == 'decimal') {
              resetToZero();
              numSys = 10;
         } else if (selIn == 'binary') {
              resetToZero();
              numSys = 2; 
         } else if (selIn == 'hexadecimal') {
              resetToZero();
               
         } else {
              resetToZero();              
         }         
    });
  
  // функція - лічильник 
    $('.btn-one').click(function() {
      countOne++;
     if (countOne < numSys) {
        $('.one').val(countOne);
     } 
     else if (countOne === numSys){
      countOne = 0;
      $('.one').val(countOne);
      
           countTwo++;
           if (countTwo < numSys) {
              $('.two').val(countTwo);
           } 
           else if (countTwo === numSys){
            countTwo = 0;
            $('.two').val(countTwo);

                 countThree++;
                 if (countThree < numSys) {
                    $('.three').val(countThree);
                 } 
                 else if (countThree === numSys){
                  countThree = 0;
                  $('.three').val(countThree);

                         countFour++;
                         if (countFour < numSys) {
                            $('.four').val(countFour);
                         } 
                         else if (countFour === numSys){
                          countFour = 0;
                          $('.four').val(countFour);
                         }

                 }

           }

     } 

     //виконується функція перерахунку з однієї системи числення в другу в залежності відвибору
     if (selIn === 'binary' &&  selOut === 'decimal') {
        biToDec();   
    } else if (selIn === 'decimal' && selOut === 'binary') {
        decToBi();
    } else if (selIn === 'decimal' && selOut === 'hexadecimal') {
        decToHex();
    }


  });
    $('.btn-two').click(function() {
      countTwo++;
     if (countTwo < numSys) {
        $('.two').val(countTwo);
     } 
     else if (countTwo === numSys){
      countTwo = 0;
      $('.two').val(countTwo);

           countThree++;
           if (countThree < numSys) {
              $('.three').val(countThree);
           } 
           else if (countThree === numSys){
            countThree = 0;
            $('.three').val(countThree);

                   countFour++;
                   if (countFour < numSys) {
                      $('.four').val(countFour);
                   } 
                   else if (countFour === numSys){
                    countFour = 0;
                    $('.four').val(countFour);
                   }

           }

     }


    if (selIn === 'binary' &&  selOut === 'decimal') {
        biToDec();   
    } else if (selIn === 'decimal' && selOut === 'binary') {
        decToBi();
    } else if (selIn === 'decimal' && selOut === 'hexadecimal') {
        decToHex();
    }
  });
       $('.btn-three').click(function() {
      countThree++;
     if (countThree < numSys) {
        $('.three').val(countThree);
     } 
     else if (countThree === numSys){
      countThree = 0;
      $('.three').val(countThree);

          countFour++;
           if (countFour < numSys) {
              $('.four').val(countFour);
           } 
           else if (countFour === numSys){
            countFour = 0;
            $('.four').val(countFour);
           }

     }
    if (selIn === 'binary' &&  selOut === 'decimal') {
        biToDec();   
    } else if (selIn === 'decimal' && selOut === 'binary') {
        decToBi();
    } else if (selIn === 'decimal' && selOut === 'hexadecimal') {
        decToHex();
    }
  });
      $('.btn-four').click(function() {
        countFour++;
         if (countFour < numSys) {
            $('.four').val(countFour);
         } 
         else if (countFour === numSys){
          countFour = 0;
          $('.four').val(countFour);
         }

    if (selIn === 'binary' &&  selOut === 'decimal') {
        biToDec();   
    } else if (selIn === 'decimal' && selOut === 'binary') {
        decToBi();
    } else if (selIn === 'decimal' && selOut === 'hexadecimal') {
        decToHex();
    } 
  });


//функція приведення до степеню
//function pow(x, n) {
//  for (let i = 1; i < n; i++) {
//    result *= x;
//  }
//}

// переводить з двійкової системи в десяткову
 function biToDec() {
    var dec = ($('#_four').val() * Math.pow(2,3)) 
            + ($('#_three').val() * Math.pow(2,2))
            + ($('#_two').val() * Math.pow(2,1))
            + ($('#_one').val() * Math.pow(2,0));
    $('#sum').text(dec);
  };


//переводить з десяткової системи в двійкову
function decToBi() {
    var readNum = $('#_four').val() + $('#_three').val() + $('#_two').val() + $('#_one').val();
       
    var bi = +parseInt(readNum).toString(2); 
    $('#sum').text(bi);
  };

//переводить з десяткової системи в 16-річну

function decToHex() {
  var readNumToHex = $('#_four').val() + $('#_three').val() + $('#_two').val() + $('#_one').val();  
  var x = +readNumToHex;
  var hex = x.toString(16);  
  $('#sum').text(hex); 
};


});







//ONE
/*
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


*/




