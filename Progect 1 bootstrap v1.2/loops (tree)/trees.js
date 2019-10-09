//VERSION 1
function drawStarNum () {
var out = document.getElementById('out1'),
	num = document.getElementById('_num1').value,
	starsArr = [],
	mark = '*',
	n = '';

for (var i = 1; i <= num; i++) {
	n = n + mark;
starsArr.push(i + '. ' + n);
}
out.innerHTML = starsArr.join('<br>');
};

//VERSION 2
function drawTree() {
	var out2 = document.getElementById('out2'),
		mark2 = document.getElementById('_symbol2').value,
		num2 = document.getElementById('_num2').value,
		space2 = document.getElementById('_space').value,
		starsArr2 = []; 

  for(var i=0; i<num2; i++){
    var star2 = '';
    var sp2 = '';
    for(var k=1; k<=num2-i; k++){
      sp2 += space2;
    }
    for(var j=0; j<=i; j++) {
        star2 += mark2;
    }        
    starsArr2.push(sp2 + star2);
	}
	out2.innerHTML = starsArr2.join('<br>');
}


