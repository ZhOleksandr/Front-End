//var ch = "child";
//var teen = "teenager";
//var adult = "adult";

function check() {
	var age, result;
	age = document.getElementById("_age").value;
	age = parseInt(age);
	if (age <= 12) {
		result = "child";
	} else if(age >= 13 && age <= 17) {
		result = "teenager";
	} else if (age >= 18 ) {
		result = "adult";
	} else {
		result = "Error";
	}
	
	document.getElementById('_result').innerHTML = result;
}





/*
// Заміна елементу
var child = document.createElement("p");
var text = document.createTextNode(res);
child.appendChild(text);
var parent = document.getElementById("result");
var children = document.getElementsByTagName("p");
parent.replaceChild(child, children[1]);
*/

/*
function check(n) {
	if (n <= 12) {
		return child;
	} else if(n >= 13 && n <= 17) {
		return teen;
	} else if (n >= 18 ) {
		return adult;
	} else {
		return "Error";
	}
} 
*/