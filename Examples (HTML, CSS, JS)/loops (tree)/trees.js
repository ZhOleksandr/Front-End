//VERSION 1
function drawStar() {
var out1 = document.getElementById('out1');
var num1 = document.getElementById('_num1').value;
var starsArr1 = [];
var mark1 = '*';
var n1 = '';
for (var i = 1; i <= num1; i++) {
	n1 = n1 + mark1;
starsArr1.push(n1);
}
out1.innerHTML = starsArr1.join('<br>');
}
//VERSION 2
function drawStarNum () {
var out2 = document.getElementById('out2');
var num2 = document.getElementById('_num2').value;
var starsArr2 = [];
var mark2 = '*';
var n2 = '';
for (var i = 1; i <= num2; i++) {
	n2 = n2 + mark2;
starsArr2.push(i + '. ' + n2);
}
out2.innerHTML = starsArr2.join('<br>');
}

//VERSION 3
function drawSymbol() {	
	var out3 = document.getElementById('out3');
	var mark3 = document.getElementById('_symbol3').value;
	var num3 = document.getElementById('_num3').value;
	var starsArr3 = [];
	var n3 = '';
	for (var i = 0; i < num3; i++) {
		n3 = n3 + mark3;
	starsArr3.push(n3);
	}
	out3.innerHTML = starsArr3.join('<br>');	
}

//VERSION 4
function drawTree() {
	var out4 = document.getElementById('out4');
	var mark4 = document.getElementById('_symbol4').value;
	var num4 = document.getElementById('_num4').value;
	var space = document.getElementById('_space').value;
	var starsArr4 = [];  
  for(var i=0; i<num4; i++){
    var star4 = '';
    var sp = '';
    for(var k=1; k<=num4-i; k++){
      sp += space;
    }
    for(var j=0; j<=i; j++) {
        star4 += mark4;
    }        
    starsArr4.push(sp + star4);
	}
	out4.innerHTML = starsArr4.join('<br>');
}
